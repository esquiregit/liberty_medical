import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../Extras/styles';
import Toastrr from '../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import MenuItem from '@material-ui/core/MenuItem';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../Extras/server';
import { Form, Formik } from 'formik';
import { useSelector } from 'react-redux';
import { FormikTextField } from 'formik-material-fields';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../Extras/Dialogue';
import { getGenderOptions, getMaxDate, getTitleOptions, isPrefixValid } from '../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    title : Yup
        .string()
        .required('Please Select Patient\'s Title'),
    first_name: Yup
        .string()
        .required('Please Fill In Patient\'s First Name'),
    last_name: Yup
        .string()
        .required('Please Fill In Patient\'s Last Name'),
    gender: Yup
        .string()
        .required('Please Select Patient\'s Gender')
        .test("title-gender-mismatch", "Selected Title And Gender Mismatch", function(value) {
                if((this.parent.title === "Mrs." || this.parent.title === "Ms.") && value === "Male") {
                    return false;
                } else if(this.parent.title === "Mr." && value === "Female") {
                    return false;
                }
                return true;
        }),
    date_of_birth: Yup
        .string()
        .required('Please Fill In Patient\'s Date Of Birth'),
    email_address: Yup
        .string()
        .email('Invalid Emaill Address Format Entered'),
    mobile_phone: Yup
        .string()
        .required('Please Fill In Patient\'s Mobile Phone Number')
        .test('non-numeric', 'Mobile Phone Number Must Contain ONLY Digits', function(value) {
            return /^[0-9]+$/.test(value);
        })
        .min(10, 'Mobile Phone Number MUST Contain 10 Digits')
        .max(10, 'Mobile Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => value && isPrefixValid(value.substring(0, 3))),
    home_phone: Yup
        .string()
        .test('non-numeric', 'Home Phone Number Must Contain ONLY Digits', function(value) {
            if(value === undefined) {
                return true
            } else {
                return /^[0-9]+$/.test(value);
            }
        })
        .min(10, 'Home Phone Number MUST Contain 10 Digits')
        .max(10, 'Home Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => {
            if(value === undefined) {
                return true
            } else {
                return isPrefixValid(value.substring(0, 3))
            }
        }),
    work_phone: Yup
        .string()
        .test('non-numeric', 'Work Phone Number Must Contain ONLY Digits', function(value) {
            if(value === undefined) {
                return true
            } else {
                return /^[0-9]+$/.test(value);
            }
        })
        .min(10, 'Work Phone Number MUST Contain 10 Digits')
        .max(10, 'Work Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => {
            if(value === undefined) {
                return true
            } else {
                return isPrefixValid(value.substring(0, 3))
            }
        }),
    next_of_kin_name: Yup
        .string()
        .required('Please Fill In Patient\'s Next Of Kin'),
    next_of_kin_number: Yup
        .string()
        .required('Please Fill In Patient\'s Next Of Kin\'s Phone Number')
        .test('non-numeric', 'Next Of Kin\'s Phone Number Must Contain ONLY Digits', function(value) {
            return /^[0-9]+$/.test(value);
        })
        .min(10, 'Next Of Kin\'s Phone Number MUST Contain 10 Digits')
        .max(10, 'Next Of Kin\'s Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => value && isPrefixValid(value.substring(0, 3)))
});

function AddPatient({ closeAddPatientModal, closeExpandable }) {
    const classes       = styles();
    const staff         = useSelector(state => state.authReducer.staff);
    const genderOptions = getGenderOptions();
    const titleOptions  = getTitleOptions();
    const initialValues = {
        title              : '',
        first_name         : '',
        middle_name        : '',
        last_name          : '',
        gender             : '',
        date_of_birth      : '',
        email_address      : '',
        mobile_phone       : '',
        home_phone         : '',
        work_phone         : '',
        next_of_kin_name   : '',
        next_of_kin_number : '',
        entered_by         : staff.staff_id,
    };
    const [open, setOpen]         = useState(true);
    const [error, setError]       = useState(false);
    const [values, setValues]     = useState([]);
    const [message, setMessage]   = useState('');
    const [warning, setWarning]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const handleClose  = () => { setOpen(false); closeAddPatientModal(); };
    const closeConfirm = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onConfirm    = values => { setValues(values); setShowDialogue(true); };
    const onSubmit     = () => {
        setBackdrop(true);
        setError(false);
        setWarning(false);
        setComError(false);
        const abortController = new AbortController();
        const signal          = abortController.signal;

        Axios.post(getBaseURL()+'add_patient', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setOpen(false);
                    closeExpandable(response.data[0].message, 'add patient', response.data[0].patient);
                } else if(response.data[0].status.toLowerCase() === 'warning') {
                    setMessage(response.data[0].message);
                    setWarning(true);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                }
                setBackdrop(false);
            })
            .catch(error => {
                setComError(true);
                setBackdrop(false);
                setMessage('Network Error. Server Unreachable....');
            });

        return () => abortController.abort();
    };

    return (
        <>
            { error        && <Toastrr message={message} type="error"   /> }
            { warning      && <Toastrr message={message} type="warning" /> }
            { comError     && <Toastrr message={message} type="info"    /> }
            { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Add Patient?'} closeConfirm={closeConfirm} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Adding Patient. Please Wait....</span>
            </Backdrop>
            <Dialog
                TransitionComponent={Transition}
                disableBackdropClick={true}
                disableEscapeKeyDown={true}
                scroll='paper'
                fullWidth={true}
                maxWidth='md'
                onClose={handleClose}
                aria-labelledby="customized-dialog-title"
                open={open}>
                <Formik
                    initialValues={initialValues}
                    validationSchema={validationSchema}
                    onSubmit={onConfirm} >
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle id="customized-dialog-title" onClose={handleClose}>
                                Patient
                            </DialogTitle>
                            <DialogContent dividers>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            select
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="title"
                                            label="Title"
                                            name="title">
                                            {titleOptions.map((title, index) => (
                                                <MenuItem key={index} value={title.value}>
                                                    {title.label}
                                                </MenuItem>
                                            ))}
                                        </FormikTextField>
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="first_name"
                                            label="First Name"
                                            placeholder="First Name"
                                            name="first_name" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="middle_name"
                                            label="Middle Name - Optional"
                                            placeholder="Middle Name"
                                            name="middle_name" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="last_name"
                                            label="Last Name"
                                            placeholder="Last Name"
                                            name="last_name" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            select
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="gender"
                                            label="Gender"
                                            name="gender">
                                            {genderOptions.map((gender, index) => (
                                                <MenuItem key={index} value={gender.value}>
                                                    {gender.label}
                                                </MenuItem>
                                            ))}
                                        </FormikTextField>
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            InputProps={{ inputProps: { max: getMaxDate() } }}
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="date_of_birth"
                                            label="Date Of Birth"
                                            placeholder="Date Of Birth"
                                            name="date_of_birth"
                                            type="date" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="email_address"
                                            label="Email Address"
                                            placeholder="Email Address"
                                            name="email_address" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="mobile_phone"
                                            label="Mobile Phone"
                                            placeholder="Mobile Phone"
                                            name="mobile_phone" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="home_phone"
                                            label="Home Phone"
                                            placeholder="Home Phone"
                                            name="home_phone" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="work_phone"
                                            label="Work Phone - Optional"
                                            placeholder="Work Phone"
                                            name="work_phone" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="next_of_kin_name"
                                            label="Next Of Kin"
                                            placeholder="Next Of Kin"
                                            name="next_of_kin_name" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="next_of_kin_number"
                                            label="Next Of Kin Number"
                                            placeholder="Next Of Kin Number"
                                            name="next_of_kin_number" />
                                    </Grid>
                                </Grid>
                            </DialogContent>
                            <DialogActions>
                                <Tippy content="Reset Form">
                                    <Button
                                        onClick={resetForm}
                                        color="secondary">
                                        Reset
                                    </Button>
                                </Tippy>
                                <Tippy content="Add Patient Details">
                                    <Button
                                        type="submit"
                                        disabled={!(isValid && dirty)}
                                        color="primary">
                                        Add Patient
                                    </Button>
                                </Tippy>
                            </DialogActions>
                        </Form>
                    )}
                </Formik>
            </Dialog>
        </>
    );
}

export default AddPatient;

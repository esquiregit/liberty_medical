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
import { getGenderOptions, isPrefixValid } from '../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    first_name: Yup
        .string()
        .required('Please Fill In Staff\'s First Name'),
    last_name: Yup
        .string()
        .required('Please Fill In Staff\'s Last Name'),
    gender: Yup
        .string()
        .required('Please Select Staff\'s Gender'),
    email_address: Yup
        .string()
        .required('Please Fill In Staff\'s Gender')
        .email('Invalid Emaill Address Format Entered'),
    phone_number: Yup
        .string()
        .required('Please Fill In Staff\'s Phone Number')
        .test('non-numeric', 'Phone Number Must Contain ONLY Digits', function(value) {
            return /^[0-9]+$/.test(value);
        })
        .min(10, 'Phone Number MUST Contain 10 Digits')
        .max(10, 'Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => value && isPrefixValid(value.substring(0, 3))),
    phone_number_two: Yup
        .string()
        .test('non-numeric', 'Alternate Phone Number Must Contain ONLY Digits', function(value) {
            if(value === undefined) {
                return true
            } else {
                return /^[0-9]+$/.test(value);
            }
        })
        .min(10, 'Alternate Phone Number MUST Contain 10 Digits')
        .max(10, 'Alternate Phone Number MUST Contain 10 Digits')
        .test('invalid-prefix', 'Invalid Phone Number Prefix', value => {
            if(value === undefined) {
                return true
            } else {
                return isPrefixValid(value.substring(0, 3))
            }
        }),
    role: Yup
        .string()
        .required('Please Select Staff\'s Role'),
});

function EditStaff({ history, staff, closeEditModal, closeExpandable }) {
    const classes       = styles();
    const admin         = useSelector(state => state.authReducer.staff);
    const genderOptions = getGenderOptions();
    const initialValues = {
        staff            : admin.staff_id,
        id               : staff.id,
        staff_id         : staff.staff_id,
        first_name       : staff.first_name,
        other_name       : staff.other_name,
        last_name        : staff.last_name,
        gender           : staff.gender,
        email_address    : staff.email_address,
        phone_number     : staff.phone_number,
        phone_number_two : staff.phone_number_two,
        role             : staff.role_id,
    };
    const [open, setOpen]         = useState(true);
    const [error, setError]       = useState(false);
    const [values, setValues]     = useState([]);
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState('');
    const [warning, setWarning]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [roleOptions, setRoleOptions]   = useState([]);
    const [showDialogue, setShowDialogue] = useState(false);

    React.useEffect(()    => {
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(admin.role_name.toLowerCase() === 'administrator') {
            Axios.post(getBaseURL()+'get_roles_dropdown', { signal: signal })
                .then(response => {
                    setRoleOptions(response.data);
                    setLoading(false);
                })
                .catch(error => {
                    setLoading(false);
                    setMessage('Network Error. Server Unreachable....');
                    setComError(true);
                });
        } else {
            history.push('/');
        }

        return () => abortController.abort();
    }, [admin, history, loading]);

    const handleClose  = () => { setOpen(false); closeEditModal(); };
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

        Axios.post(getBaseURL()+'edit_staff', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setOpen(false);
                    closeExpandable(response.data[0].message);
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
            { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Update Staff?'} closeConfirm={closeConfirm} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Updating Staff Details. Please Wait....</span>
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
                                Update Staff
                            </DialogTitle>
                            <DialogContent dividers>
                                <Grid container spacing={3}>
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
                                            id="other_name"
                                            label="Other Name - Optional"
                                            placeholder="Other Name"
                                            name="other_name" />
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
                                            id="phone_number"
                                            label="Phone Number"
                                            placeholder="Phone Number"
                                            name="phone_number" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="phone_number_two"
                                            label="Alternate Phone Number - Optional"
                                            placeholder="Alternate Phone Number"
                                            name="phone_number_two" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormikTextField
                                            select
                                            variant="outlined"
                                            margin="normal"
                                            fullWidth
                                            id="role"
                                            label="Role"
                                            name="role">
                                            {roleOptions.map((role, index) => (
                                                <MenuItem key={index} value={role.value}>
                                                    {role.label}
                                                </MenuItem>
                                            ))}
                                        </FormikTextField>
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
                                <Tippy content="Update Staff Details">
                                    <Button
                                        type="submit"
                                        disabled={!(isValid && dirty)}
                                        color="primary">
                                        Update Staff
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

export default EditStaff;

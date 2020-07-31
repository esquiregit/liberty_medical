import React, { useState } from 'react';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../../../../Extras/styles';
import Toastrr from '../../../../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import MenuItem from '@material-ui/core/MenuItem';
import ConfirmDialogue from '../../../../../Extras/ConfirmDialogue';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../../../../Extras/server';
import { Form, Formik } from 'formik';
import { useSelector } from 'react-redux';
import { FormikTextField } from 'formik-material-fields';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import { getTodaysDate, getAntibiotics, getBacterias, getCultures } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    culture: Yup
        .string()
        .required('Required'),
    bacteria_one: Yup
        .string()
        .required('Required'),
    bacteria_two: Yup
        .string()
        .required('Required'),
    bacteria_three: Yup
        .string()
        .required('Required'),
    antibiotics_one: Yup
        .string()
        .required('Required'),
    antibiotics_two: Yup
        .string()
        .required('Required'),
    antibiotics_three: Yup
        .string()
        .required('Required'),
    antibiotics_four: Yup
        .string()
        .required('Required'),
    antibiotics_five: Yup
        .string()
        .required('Required'),
    antibiotics_six: Yup
        .string()
        .required('Required'),
    antibiotics_seven: Yup
        .string()
        .required('Required'),
    antibiotics_eight: Yup
        .string()
        .required('Required'),
    antibiotics_nine: Yup
        .string()
        .required('Required'),
    antibiotics_ten: Yup
        .string()
        .required('Required'),
    antibiotics_eleven: Yup
        .string()
        .required('Required'),
    antibiotics_twelve: Yup
        .string()
        .required('Required'),
    antibiotics_thirteen: Yup
        .string()
        .required('Required'),
    antibiotics_fourteen: Yup
        .string()
        .required('Required'),
    antibiotics_fifteen: Yup
        .string()
        .required('Required'),
    antibiotics_sixteen: Yup
        .string()
        .required('Required'),
    antibiotics_seventeen: Yup
        .string()
        .required('Required'),
    antibiotics_eighteen: Yup
        .string()
        .required('Required'),
    antibiotics_nineteen: Yup
        .string()
        .required('Required'),
    antibiotics_twenty: Yup
        .string()
        .required('Required'),
    antibiotics_twenty_one: Yup
        .string()
        .required('Required'),
    antibiotics_twenty_two: Yup
        .string()
        .required('Required'),
    antibiotics_twenty_three: Yup
        .string()
        .required('Required'),
    antibiotics_twenty_four: Yup
        .string()
        .required('Required'),
    sensitivity_one: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_two: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_three: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_four: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_five: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_six: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_seven: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_eight: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_nine: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_ten: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_eleven: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twelve: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_thirteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_fourteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_fifteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_sixteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_seventeen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_eighteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_nineteen: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twenty: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twenty_one: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twenty_two: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twenty_three: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    sensitivity_twenty_four: Yup
        .string()
        .required('Required')
        .max(1, 'Please Enter Only 1 Character')
        .test('invalid-value', 'Must Be S or R', value => {
            return value && (value.toLowerCase() === 'r' || value.toLowerCase() === 's');
        }),
    comments: Yup
        .string()
});

function AddBloodCS({ patient, closeModal }) {
    const staff               = useSelector(state => state.authReducer.staff);
    const classes             = styles();
    const cultureOptions      = getCultures();
    const bacteriaOptions     = getBacterias();
    const antibioticsOptions = getAntibiotics();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        culture : '',
        bacteria_one : '',
        bacteria_two : '',
        antibiotics_one : '',
        antibiotics_two : '',
        antibiotics_three : '',
        antibiotics_four : '',
        antibiotics_five : '',
        antibiotics_six : '',
        antibiotics_seven : '',
        antibiotics_eight : '',
        antibiotics_nine : '',
        antibiotics_ten : '',
        antibiotics_eleven : '',
        antibiotics_twelve : '',
        antibiotics_thirteen : '',
        antibiotics_fourteen : '',
        antibiotics_fifteen : '',
        antibiotics_sixteen : '',
        antibiotics_seventeen : '',
        antibiotics_eighteen : '',
        antibiotics_nineteen : '',
        antibiotics_twenty : '',
        antibiotics_twenty_one : '',
        antibiotics_twenty_two : '',
        antibiotics_twenty_three : '',
        antibiotics_twenty_four : '',
        sensitivity_one : '',
        sensitivity_two : '',
        sensitivity_three : '',
        sensitivity_four : '',
        sensitivity_five : '',
        sensitivity_six : '',
        sensitivity_seven : '',
        sensitivity_eight : '',
        sensitivity_nine : '',
        sensitivity_ten : '',
        sensitivity_eleven : '',
        sensitivity_twelve : '',
        sensitivity_thirteen : '',
        sensitivity_fourteen : '',
        sensitivity_fifteen : '',
        sensitivity_sixteen : '',
        sensitivity_seventeen : '',
        sensitivity_eighteen : '',
        sensitivity_nineteen : '',
        sensitivity_twenty : '',
        sensitivity_twenty_one : '',
        sensitivity_twenty_two : '',
        sensitivity_twenty_three : '',
        sensitivity_twenty_four : '',
        comments: '',
        entered_by : staff.staff_id,
    };

    const [open, setOpen]         = useState(true);
    const [error, setError]       = useState(false);
    const [values, setValues]     = useState([]);
    const [message, setMessage]   = useState('');
    const [success, setSuccess]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const handleClose  = () => { setOpen(false); closeModal('BloodCS'); };
    const closeConfirm = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onConfirm    = values => { setValues(values); setShowDialogue(true); };
    const onSubmit     = () => {
        setBackdrop(true);
        setError(false);
        setComError(false);
        const abortController = new AbortController();
        const signal          = abortController.signal;

        Axios.post(getBaseURL()+'add_blood_cs', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('BloodCS'); }, 1050);
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
            { error        && <Toastrr message={message} type="error" /> }
            { success      && <Toastrr message={message} type="success" /> }
            { comError     && <Toastrr message={message} type="info"  /> }
            { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Save Lab?'} closeConfirm={closeConfirm} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Adding Lab. Please Wait....</span>
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
                    onSubmit={onConfirm}>
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                blood C/S
                            </DialogTitle>
                            <DialogContent dividers>
                                <table id="lab-display-table">
                                    <tbody>
                                        <tr>
                                            <th>Patient ID:</th>
                                            <td>{patient.patient_id}</td>
                                            <th>Name: </th>
                                            <td colSpan="3">{patient.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth:</th>
                                            <td>{patient.date_of_birth}</td>
                                            <th>Gender:</th>
                                            <td>{patient.gender}</td>
                                            <th>Date:</th>
                                            <td>{getTodaysDate()}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table">
                                    <tbody>
                                        <tr>
                                            <td width="20%" className="text-left">Culture</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="culture"
                                                    name="culture">
                                                    {cultureOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="30%">
                                                <div id="key">
                                                    <p><span>KEY</span></p>
                                                    <p><span>S</span> Means Sensitive</p>
                                                    <p><span>R</span> Means Resistant</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table">
                                    <tbody>
                                        <tr>
                                            <th colSpan="6">Sensitivity</th>
                                        </tr>
                                        <tr>
                                            <th width="16.67%">Bacteria</th>
                                            <td width="20.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bacteria_one"
                                                    name="bacteria_one">
                                                    {bacteriaOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_one"
                                                    name="antibiotics_one">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_one"
                                                    name="sensitivity_one"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_two"
                                                    name="antibiotics_two">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_two"
                                                    name="sensitivity_two"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_three"
                                                    name="antibiotics_three">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_three"
                                                    name="sensitivity_three"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_four"
                                                    name="antibiotics_four">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_four"
                                                    name="sensitivity_four"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_five"
                                                    name="antibiotics_five">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_five"
                                                    name="sensitivity_five"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_six"
                                                    name="antibiotics_six">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_six"
                                                    name="sensitivity_six"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_seven"
                                                    name="antibiotics_seven">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_seven"
                                                    name="sensitivity_seven"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_eight"
                                                    name="antibiotics_eight">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_eight"
                                                    name="sensitivity_eight"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="16.67%">Bacteria</th>
                                            <td width="20.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bacteria_two"
                                                    name="bacteria_two">
                                                    {bacteriaOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_nine"
                                                    name="antibiotics_nine">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_nine"
                                                    name="sensitivity_nine"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_ten"
                                                    name="antibiotics_ten">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_ten"
                                                    name="sensitivity_ten"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_eleven"
                                                    name="antibiotics_eleven">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_eleven"
                                                    name="sensitivity_eleven"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twelve"
                                                    name="antibiotics_twelve">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twelve"
                                                    name="sensitivity_twelve"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_thirteen"
                                                    name="antibiotics_thirteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_thirteen"
                                                    name="sensitivity_thirteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_fourteen"
                                                    name="antibiotics_fourteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_fourteen"
                                                    name="sensitivity_fourteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_fifteen"
                                                    name="antibiotics_fifteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_fifteen"
                                                    name="sensitivity_fifteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_sixteen"
                                                    name="antibiotics_sixteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_sixteen"
                                                    name="sensitivity_sixteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="16.67%">Bacteria</th>
                                            <td width="20.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bacteria_three"
                                                    name="bacteria_three">
                                                    {bacteriaOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                            <th width="20.67%">Antibiotics</th>
                                            <th width="10.67%">Sensitivity</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_seventeen"
                                                    name="antibiotics_seventeen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_seventeen"
                                                    name="sensitivity_seventeen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_eighteen"
                                                    name="antibiotics_eighteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_eighteen"
                                                    name="sensitivity_eighteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_nineteen"
                                                    name="antibiotics_nineteen">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_nineteen"
                                                    name="sensitivity_nineteen"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twenty"
                                                    name="antibiotics_twenty">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twenty"
                                                    name="sensitivity_twenty"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twenty_one"
                                                    name="antibiotics_twenty_one">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twenty_one"
                                                    name="sensitivity_twenty_one"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twenty_two"
                                                    name="antibiotics_twenty_two">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twenty_two"
                                                    name="sensitivity_twenty_two"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twenty_three"
                                                    name="antibiotics_twenty_three">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twenty_three"
                                                    name="sensitivity_twenty_three"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                            <td>                                                
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="antibiotics_twenty_four"
                                                    name="antibiotics_twenty_four">
                                                    {antibioticsOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sensitivity_twenty_four"
                                                    name="sensitivity_twenty_four"
                                                    InputProps={{ inputProps: { maxLength: 1 } }} />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
                                            <td colSpan="5">
                                                <FormikTextField
                                                    multiline
                                                    rows={3}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="comments"
                                                    name="comments" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </DialogContent>
                            <DialogActions className="dialogue dialogue-actions">
                                <Tippy content="Reset Form">
                                    <Button
                                        onClick={resetForm}
                                        color="secondary">
                                        Reset
                                    </Button>
                                </Tippy>
                                <Tippy content="Add Lab">
                                    <Button
                                        type="submit"
                                        disabled={!(isValid && dirty)}
                                        color="primary">
                                        Add
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

export default AddBloodCS;

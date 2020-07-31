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
import { getTodaysDate, getAntibiotics, getGramStains, getBacterias, getZNStains, getCultures, getAppearances, get_pus_cells_options } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    appearance: Yup
        .string()
        .required('Required'),
    gram_stain: Yup
        .string()
        .required('Required'),
    pus_cells: Yup
        .string()
        .required('Required'),
    zn_stain: Yup
        .string()
        .required('Required'),
    culture: Yup
        .string()
        .required('Required'),
    bacteria_one: Yup
        .string()
        .required('Required'),
    bacteria_two: Yup
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
    comments: Yup
        .string()
});

function EditSputumCS({ lab, closeModal, closeExpandable }) {
    const staff               = useSelector(state => state.authReducer.staff);
    const classes             = styles();
    const gramStains          = getGramStains();
    const znStains            = getZNStains();
    const cultureOptions      = getCultures();
    const bacteriaOptions     = getBacterias();
    const antibioticsOptions = getAntibiotics();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        appearance : lab.appearance,
        gram_stain : lab.gram_stain,
        zn_stain : lab.zn_stain,
        pus_cells : lab.pus_cells,
        culture : lab.culture,
        bacteria_one : lab.bacteria_one,
        bacteria_two : lab.bacteria_two,
        antibiotics_one : lab.antibiotics_one,
        antibiotics_two : lab.antibiotics_two,
        antibiotics_three : lab.antibiotics_three,
        antibiotics_four : lab.antibiotics_four,
        antibiotics_five : lab.antibiotics_five,
        antibiotics_six : lab.antibiotics_six,
        antibiotics_seven : lab.antibiotics_seven,
        antibiotics_eight : lab.antibiotics_eight,
        antibiotics_nine : lab.antibiotics_nine,
        antibiotics_ten : lab.antibiotics_ten,
        antibiotics_eleven : lab.antibiotics_eleven,
        antibiotics_twelve : lab.antibiotics_twelve,
        antibiotics_thirteen : lab.antibiotics_thirteen,
        antibiotics_fourteen : lab.antibiotics_fourteen,
        antibiotics_fifteen : lab.antibiotics_fifteen,
        antibiotics_sixteen : lab.antibiotics_sixteen,
        sensitivity_one : lab.sensitivity_one,
        sensitivity_two : lab.sensitivity_two,
        sensitivity_three : lab.sensitivity_three,
        sensitivity_four : lab.sensitivity_four,
        sensitivity_five : lab.sensitivity_five,
        sensitivity_six : lab.sensitivity_six,
        sensitivity_seven : lab.sensitivity_seven,
        sensitivity_eight : lab.sensitivity_eight,
        sensitivity_nine : lab.sensitivity_nine,
        sensitivity_ten : lab.sensitivity_ten,
        sensitivity_eleven : lab.sensitivity_eleven,
        sensitivity_twelve : lab.sensitivity_twelve,
        sensitivity_thirteen : lab.sensitivity_thirteen,
        sensitivity_fourteen : lab.sensitivity_fourteen,
        sensitivity_fifteen : lab.sensitivity_fifteen,
        sensitivity_sixteen : lab.sensitivity_sixteen,
        comments : lab.comments,
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

    const handleClose  = () => { setOpen(false); closeModal('sputumcs'); };
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

        Axios.post(getBaseURL()+'edit_sputum_cs', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setMessage(response.data[0].message);
                    setSuccess(true);
                    setTimeout(() => {
                        setOpen(false);
                        closeExpandable(response.data[0].message);
                    }, 1000);
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
                <CircularProgress color="inherit" /> <span className='ml-15'>Editing Lab. Please Wait....</span>
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
                                sputum C/S
                            </DialogTitle>
                            <DialogContent dividers>
                                <table id="lab-display-table">
                                    <tbody>
                                        <tr>
                                            <th>Patient ID:</th>
                                            <td>{lab.patient_id}</td>
                                            <th>Name: </th>
                                            <td colSpan="3">{lab.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth:</th>
                                            <td>{lab.date_of_birth}</td>
                                            <th>Gender:</th>
                                            <td>{lab.gender}</td>
                                            <th>Date:</th>
                                            <td>{getTodaysDate()}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table">
                                    <tbody>
                                        <tr>
                                            <th width="25%" className="text-right">Macroscopy</th>
                                            <td width="25%" className="text-left pr-10">Appearance</td>
                                            <td width="25%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="appearance"
                                                    name="appearance">
                                                    {getAppearances().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <th width="25%" className="text-right">Microscopy</th>
                                            <td width="25%" className="text-left pr-10">Gram Stain</td>
                                            <td width="25%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gram_stain"
                                                    name="gram_stain">
                                                    {gramStains.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-left pr-10">Pus Cells</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pus_cells"
                                                    name="pus_cells">
                                                    {get_pus_cells_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-left pr-10">Z-N Stain</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="zn_stain"
                                                    name="zn_stain">
                                                    {znStains.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Culture</td>
                                            <td colSpan="2">
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
                                            <td>
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
                                <Tippy content="Edit Lab">
                                    <Button
                                        type="submit"
                                        disabled={!(isValid && dirty)}
                                        color="primary">
                                        Edit
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

export default EditSputumCS;

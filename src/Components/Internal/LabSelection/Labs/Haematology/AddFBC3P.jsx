import React, { useState } from 'react';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../../../Extras/styles';
import Toastrr from '../../../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import MenuItem from '@material-ui/core/MenuItem';
import ConfirmDialogue from '../../../../Extras/ConfirmDialogue';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../../../Extras/server';
import { Form, Formik } from 'formik';
import { useSelector } from 'react-redux';
import { FormikTextField } from 'formik-material-fields';
import { getTodaysDate, getFlagOptions, get_rhesus_options, get_bf_mps } from '../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    wbc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    wbc_info: Yup
        .string()
        .required('Required'),
    lym_info: Yup
        .string()
        .required('Required'),
    lym: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mid_info: Yup
        .string()
        .required('Required'),
    mid: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    gran_info: Yup
        .string()
        .required('Required'),
    gran: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    lym_one_info: Yup
        .string()
        .required('Required'),
    lym_one: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mid_two_info: Yup
        .string()
        .required('Required'),
    mid_two: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    gran_three_info: Yup
        .string()
        .required('Required'),
    gran_three: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rbc_info: Yup
        .string()
        .required('Required'),
    rbc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    hgb_info: Yup
        .string()
        .required('Required'),
    hgb: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    hct_info: Yup
        .string()
        .required('Required'),
    hct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mcv_info: Yup
        .string()
        .required('Required'),
    mcv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mch_info: Yup
        .string()
        .required('Required'),
    mch: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mchc_info: Yup
        .string()
        .required('Required'),
    mchc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rdw_cv_info: Yup
        .string()
        .required('Required'),
    rdw_cv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rdw_sd_info: Yup
        .string()
        .required('Required'),
    rdw_sd: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    plt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    plt_info: Yup
        .string()
        .required('Required'),
    mpv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mpv_info: Yup
        .string()
        .required('Required'),
    pdw: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    pdw_info: Yup
        .string()
        .required('Required'),
    pct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    pct_info: Yup
        .string()
        .required('Required'),
    sickling_test: Yup
        .string()
        .required('Please Select'),
    bf_mps: Yup
        .string()
        .required('Please Select'),
    esr: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    blood_film_comment: Yup
        .string()
        .required('Required'),
});

function AddFBC3P({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        wbc: '',
        wbc_info: '',
        lym : '',
        lym_info: '',
        mid : '',
        mid_info: '',
        gran : '',
        gran_info: '',
        lym_one : '',
        lym_one_info: '',
        mid_two : '',
        mid_two_info: '',
        gran_three : '',
        gran_three_info: '',
        rbc : '',
        rbc_info : '',
        hgb : '',
        hgb_info : '',
        hct : '',
        hct_info : '',
        mcv : '',
        mcv_info : '',
        mch : '',
        mch_info : '',
        mchc : '',
        mchc_info : '',
        rdw_cv : '',
        rdw_cv_info : '',
        rdw_sd : '',
        rdw_sd_info : '',
        plt : '',
        plt_info : '',
        mpv : '',
        mpv_info : '',
        pdw : '',
        pdw_info : '',
        pct : '',
        pct_info : '',
        sickling_test : '',
        bf_mps : '',
        esr : '',
        blood_film_comment : '',
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

    const handleClose  = () => { setOpen(false); closeModal('fbc3p'); };
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

        Axios.post(getBaseURL()+'add_fbc_3p', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('fbc3p'); }, 1050);
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
                                FULL BLOOD COUNT 3P
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

                                <table id="lab-table" className="mt-20">
                                    <thead>
                                        <tr>
                                            <th width="25%">Test Required</th>
                                            <th width="25%">Results</th>
                                            <th width="16.67%">Unit</th>
                                            <th width="16.67%">Range</th>
                                            <th width="16.67%">Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>WBC</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="wbc"
                                                    name="wbc"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(2.5 - 8.5)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="wbc_info"
                                                    name="wbc_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LYM %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="lym"
                                                    name="lym"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(20.0 - 60.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="lym_info"
                                                    name="lym_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MID %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mid"
                                                    name="mid"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(1.0 - 15.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mid_info"
                                                    name="mid_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>GRAN %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="gran"
                                                    name="gran"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(50.0 - 70.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gran_info"
                                                    name="gran_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LYM #1</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="lym_one"
                                                    name="lym_one"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(1.0 - 4.1)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="lym_one_info"
                                                    name="lym_one_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MID #2</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mid_two"
                                                    name="mid_two"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(0.1 - 1.8)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mid_two_info"
                                                    name="mid_two_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gran #3</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="gran_three"
                                                    name="gran_three"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(2.0 - 7.8)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gran_three_info"
                                                    name="gran_three_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RBC</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="rbc"
                                                    name="rbc"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^12/L</td>
                                            <td>(6.0 - 7.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="rbc_info"
                                                    name="rbc_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HGB</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="hgb"
                                                    name="hgb"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>g/dL</td>
                                            <td>(17.0 - 20.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hgb_info"
                                                    name="hgb_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HCT</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="hct"
                                                    name="hct"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(36.0 - 48.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hct_info"
                                                    name="hct_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MCV</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mcv"
                                                    name="mcv"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>fL</td>
                                            <td>(70.0 - 87.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mcv_info"
                                                    name="mcv_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MCH</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mch"
                                                    name="mch"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>Pg</td>
                                            <td>(26.0 - 32.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mch_info"
                                                    name="mch_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MCHC</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mchc"
                                                    name="mchc"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>g/dL</td>
                                            <td>(32.0 - 36.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mchc_info"
                                                    name="mchc_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RDW_CV</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="rdw_cv"
                                                    name="rdw_cv"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(11.5 - 14.5)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="rdw_cv_info"
                                                    name="rdw_cv_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RDW_SD</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="rdw_sd"
                                                    name="rdw_sd"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>fL</td>
                                            <td>(37.0 - 54.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="rdw_sd_info"
                                                    name="rdw_sd_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PLT</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="plt"
                                                    name="plt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(150 - 400)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="plt_info"
                                                    name="plt_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MPV</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mpv"
                                                    name="mpv"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>fL</td>
                                            <td>(7.4 - 10.4)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mpv_info"
                                                    name="mpv_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PDW</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="pdw"
                                                    name="pdw"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>fL</td>
                                            <td>(10.0 - 14.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pdw_info"
                                                    name="pdw_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PCT</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="pct"
                                                    name="pct"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(0.10 - 0.28)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pct_info"
                                                    name="pct_info">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sickling Test</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sickling_test"
                                                    name="sickling_test">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>BF (MPs)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bf_mps"
                                                    name="bf_mps">
                                                    {get_bf_mps().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ESR</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="esr"
                                                    name="esr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td style={{border: '1px solid cyan', marginTop: -10, marginBottom: -10}}>mm fall/hr</td>
                                            <td style={{border: '1px solid cyan', marginTop: -10, marginBottom: -10}} colSpan="2" className="text-left">3.0 - 5.0 mm fall/hr</td>
                                        </tr>
                                        <tr>
                                            <td>Blood Film Comment</td>
                                            <td colSpan="4">
                                                <FormikTextField
                                                    multiline
                                                    rows={3}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="blood_film_comment"
                                                    name="blood_film_comment" />
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

export default AddFBC3P;

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
import { getTodaysDate, getFlagOptions, get_rhesus_options, get_bf_mps } from '../../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    wbc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    wbc_flag: Yup
        .string()
        .required('Required'),
    neu_hash: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    neu_hash_flag: Yup
        .string()
        .required('Required'),
    lym_hash_flag: Yup
        .string()
        .required('Required'),
    lym_hash: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mon_hash_flag: Yup
        .string()
        .required('Required'),
    mon_hash: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    eos_hash_flag: Yup
        .string()
        .required('Required'),
    eos_hash: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bas_hash_flag: Yup
        .string()
        .required('Required'),
    bas_hash: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    neu_percent: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    neu_percent_flag: Yup
        .string()
        .required('Required'),
    lym_percent_flag: Yup
        .string()
        .required('Required'),
    lym_percent: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mon_percent_flag: Yup
        .string()
        .required('Required'),
    mon_percent: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    eos_percent_flag: Yup
        .string()
        .required('Required'),
    eos_percent: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bas_percent_flag: Yup
        .string()
        .required('Required'),
    bas_percent: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rbc_flag: Yup
        .string()
        .required('Required'),
    rbc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    hgb_flag: Yup
        .string()
        .required('Required'),
    hgb: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    hct_flag: Yup
        .string()
        .required('Required'),
    hct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mcv_flag: Yup
        .string()
        .required('Required'),
    mcv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mch_flag: Yup
        .string()
        .required('Required'),
    mch: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mchc_flag: Yup
        .string()
        .required('Required'),
    mchc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rdw_cv_flag: Yup
        .string()
        .required('Required'),
    rdw_cv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    rdw_sd_flag: Yup
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
    plt_flag: Yup
        .string()
        .required('Required'),
    mpv: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    mpv_flag: Yup
        .string()
        .required('Required'),
    pdw: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    pdw_flag: Yup
        .string()
        .required('Required'),
    pct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    pct_flag: Yup
        .string()
        .required('Required'),
    p_lcc_flag: Yup
        .string()
        .required('Required'),
    p_lcc: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    p_lcr_flag: Yup
        .string()
        .required('Required'),
    p_lcr: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
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

function EditFBC5P({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.pfirst_name+' '+lab.pmiddle_name+' '+lab.plast_name,
        wbc : lab.wbc,
        wbc_flag : lab.wbc_flag,
        neu_hash : lab.neu_hash,
        neu_hash_flag : lab.neu_hash_flag,
        lym_hash : lab.lym_hash,
        lym_hash_flag : lab.lym_hash_flag,
        mon_hash : lab.mon_hash,
        mon_hash_flag : lab.mon_hash_flag,
        eos_hash : lab.eos_hash,
        eos_hash_flag : lab.eos_hash_flag,
        bas_hash : lab.bas_hash,
        bas_hash_flag : lab.bas_hash_flag,
        neu_percent : lab.neu_percent,
        neu_percent_flag : lab.neu_percent_flag,
        lym_percent : lab.lym_percent,
        lym_percent_flag : lab.lym_percent_flag,
        mon_percent : lab.mon_percent,
        mon_percent_flag : lab.mon_percent_flag,
        eos_percent : lab.eos_percent,
        eos_percent_flag : lab.eos_percent_flag,
        bas_percent : lab.bas_percent,
        bas_percent_flag : lab.bas_percent_flag,
        rbc : lab.rbc,
        rbc_flag : lab.rbc_flag,
        hgb : lab.hgb,
        hgb_flag : lab.hgb_flag,
        hct : lab.hct,
        hct_flag : lab.hct_flag,
        mcv : lab.mcv,
        mcv_flag : lab.mcv_flag,
        mch : lab.mch,
        mch_flag : lab.mch_flag,
        mchc : lab.mchc,
        mchc_flag : lab.mchc_flag,
        rdw_cv : lab.rdw_cv,
        rdw_cv_flag : lab.rdw_cv_flag,
        rdw_sd : lab.rdw_sd,
        rdw_sd_flag : lab.rdw_sd_flag,
        plt : lab.plt,
        plt_flag : lab.plt_flag,
        mpv : lab.mpv,
        mpv_flag : lab.mpv_flag,
        pdw : lab.pdw,
        pdw_flag : lab.pdw_flag,
        pct : lab.pct,
        pct_flag : lab.pct_flag,
        p_lcc : lab.p_lcc,
        p_lcc_flag : lab.p_lcc_flag,
        p_lcr : lab.p_lcr,
        p_lcr_flag : lab.p_lcr_flag,
        sickling_test : lab.sickling_test,
        bf_mps : lab.bf_mps,
        esr : lab.esr,
        blood_film_comment : lab.blood_film_comment,
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

    const handleClose  = () => { setOpen(false); closeModal('fbc5p'); };
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

        Axios.post(getBaseURL()+'edit_fbc_5p', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('fbc5p'); }, 1050);
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
                                FULL BLOOD COUNT 5P
                            </DialogTitle>
                            <DialogContent dividers>
                                <table id="lab-display-table">
                                    <tbody>
                                        <tr>
                                            <th>Patient ID:</th>
                                            <td>{lab.patient_id}</td>
                                            <th>Name: </th>
                                            <td colSpan="3">{lab.pfirst_name} {lab.pmiddle_name} {lab.plast_name}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth:</th>
                                            <td>{moment(lab.date_of_birth).format('Do MMMM YYYY')}</td>
                                            <th>Gender:</th>
                                            <td>{lab.gender}</td>
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
                                            <td>(2.50 - 8.50)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="wbc_flag"
                                                    name="wbc_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NEU #</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="neu_hash"
                                                    name="neu_hash"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(2.00 - 7.00)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="neu_hash_flag"
                                                    name="neu_hash_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LYM #</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="lym_hash"
                                                    name="lym_hash"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(1.00 - 3.10)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="lym_hash_flag"
                                                    name="lym_hash_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MON #</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mon_hash"
                                                    name="mon_hash"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mon_hash_flag"
                                                    name="mon_hash_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EOS #</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="eos_hash"
                                                    name="eos_hash"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(0.04 - 0.40)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="eos_hash_flag"
                                                    name="eos_hash_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>BAS #</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bas_hash"
                                                    name="bas_hash"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>X10^9/L</td>
                                            <td>(0.02 - 0.10)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bas_hash_flag"
                                                    name="bas_hash_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NEU %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="neu_percent"
                                                    name="neu_percent"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(25.0 - 75.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="neu_percent_flag"
                                                    name="neu_percent_flag">
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
                                                    id="lym_percent"
                                                    name="lym_percent"
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
                                                    id="lym_percent_flag"
                                                    name="lym_percent_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MON %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mon_percent"
                                                    name="mon_percent"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(13.0 - 18.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="mon_percent_flag"
                                                    name="mon_percent_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EOS %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="eos_percent"
                                                    name="eos_percent"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(2.0 - 10.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="eos_percent_flag"
                                                    name="eos_percent_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>BAS %</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bas_percent"
                                                    name="bas_percent"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>%</td>
                                            <td>(0.0 - 1.0)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bas_percent_flag"
                                                    name="bas_percent_flag">
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
                                                    id="rbc_flag"
                                                    name="rbc_flag">
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
                                                    id="hgb_flag"
                                                    name="hgb_flag">
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
                                                    id="hct_flag"
                                                    name="hct_flag">
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
                                                    id="mcv_flag"
                                                    name="mcv_flag">
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
                                                    id="mch_flag"
                                                    name="mch_flag">
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
                                                    id="mchc_flag"
                                                    name="mchc_flag">
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
                                                    id="rdw_cv_flag"
                                                    name="rdw_cv_flag">
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
                                                    id="rdw_sd_flag"
                                                    name="rdw_sd_flag">
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
                                                    id="plt_flag"
                                                    name="plt_flag">
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
                                                    id="mpv_flag"
                                                    name="mpv_flag">
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
                                                    id="pdw_flag"
                                                    name="pdw_flag">
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
                                                    id="pct_flag"
                                                    name="pct_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>P-LCC</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="p_lcc"
                                                    name="p_lcc"
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
                                                    id="p_lcc_flag"
                                                    name="p_lcc_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>P-LCR</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="p_lcr"
                                                    name="p_lcr"
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
                                                    id="p_lcr_flag"
                                                    name="p_lcr_flag">
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

export default EditFBC5P;

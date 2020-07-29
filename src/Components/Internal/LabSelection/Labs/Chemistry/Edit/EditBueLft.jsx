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
import { getTodaysDate, getFlagOptions } from '../../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    sodium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    sodium_flag: Yup
        .string()
        .required('Please Select Flag'),
    potassium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    potassium_flag: Yup
        .string()
        .required('Please Select Flag'),
    chloride: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    chloride_flag: Yup
        .string()
        .required('Please Select Flag'),
    urea: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    urea_flag: Yup
        .string()
        .required('Please Select Flag'),
    creatinine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    creatinine_flag: Yup
        .string()
        .required('Please Select Flag'),
    egfr: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    got_ast: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    got_ast_flag: Yup
        .string()
        .required('Please Select Flag'),
    gpt_alt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    gpt_alt_flag: Yup
        .string()
        .required('Please Select Flag'),
    alkaline_phos: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    alkaline_phos_flag: Yup
        .string()
        .required('Please Select Flag'),
    ggt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    ggt_flag: Yup
        .string()
        .required('Please Select Flag'),
    bilirubin_total: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bilirubin_total_flag: Yup
        .string()
        .required('Please Select Flag'),
    bili_indirect: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bili_indirect_flag: Yup
        .string()
        .required('Please Select Flag'),
    bilirubin_direct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bilirubin_direct_flag: Yup
        .string()
        .required('Please Select Flag'),
    protein_total: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    protein_total_flag: Yup
        .string()
        .required('Please Select Flag'),
    albumin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    albumin_flag: Yup
        .string()
        .required('Please Select Flag'),
    globulin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    globulin_flag: Yup
        .string()
        .required('Please Select Flag'),
    comments: Yup
        .string()
});

function EditBueLFT({ lab, closeModal, closeExpandable }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        sodium : lab.sodium,
        sodium_flag : lab.sodium_flag,
        chloride : lab.chloride,
        chloride_flag : lab.chloride_flag,
        potassium : lab.potassium,
        potassium_flag : lab.potassium_flag,
        urea : lab.urea,
        urea_flag : lab.urea_flag,
        creatinine : lab.creatinine,
        creatinine_flag : lab.creatinine_flag,
        egfr : lab.egfr,
        got_ast : lab.got_ast,
        got_ast_flag : lab.got_ast_flag,
        gpt_alt : lab.gpt_alt,
        gpt_alt_flag : lab.gpt_alt_flag,
        alkaline_phos : lab.alkaline_phos,
        alkaline_phos_flag : lab.alkaline_phos_flag,
        ggt : lab.ggt,
        ggt_flag : lab.ggt_flag,
        bilirubin_total : lab.bilirubin_total,
        bilirubin_total_flag : lab.bilirubin_total_flag,
        bili_indirect : lab.bili_indirect,
        bili_indirect_flag : lab.bili_indirect_flag,
        bilirubin_direct : lab.bilirubin_direct,
        bilirubin_direct_flag : lab.bilirubin_direct_flag,
        protein_total : lab.protein_total,
        protein_total_flag : lab.protein_total_flag,
        albumin : lab.albumin,
        albumin_flag : lab.albumin_flag,
        globulin : lab.globulin,
        globulin_flag : lab.globulin_flag,
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

    const handleClose  = () => { setOpen(false); closeModal('buelft'); };
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

        Axios.post(getBaseURL()+'edit_bue_creatinine_lft', values, { signal: signal })
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
                                Bue + LFT
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
                                            <td colSpan="6" className="text-centre">
                                                <p className="caption">bue + creatinine</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="19.34%">Sodium</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="sodium"
                                                    name="sodium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td width="11%">mmol/L</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sodium_flag"
                                                    name="sodium_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="18.67%" colSpan="2">(135- 150)</td>
                                        </tr>
                                        <tr>
                                            <td>Potassium (Plasma/Urea)</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="potassium"
                                                    name="potassium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="potassium_flag"
                                                    name="potassium_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(3.5 - 65.5)</td>
                                        </tr>
                                        <tr>
                                            <td>Chloride</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="chloride"
                                                    name="chloride"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="chloride_flag"
                                                    name="chloride_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(95 - 110)</td>
                                        </tr>
                                        <tr>
                                            <td>Urea</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="urea"
                                                    name="urea"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="urea_flag"
                                                    name="urea_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(2.1 - 7.1)</td>
                                        </tr>
                                        <tr>
                                            <td>Creatinine</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="creatinine"
                                                    name="creatinine"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>umol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="creatinine_flag"
                                                    name="creatinine_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>Male<br />(71 - 115)</td>
                                            <td>Female<br />(53 - 106)</td>
                                        </tr>
                                        <tr>
                                            <td>eGFR (MDRD)</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="egfr"
                                                    name="egfr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table" className="mt-20">
                                    <thead>
                                        <tr>
                                            <td colSpan="7" className="text-centre">
                                                <p className="caption">LIVER FUNCTION TEST</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="22.34%" rowSpan="2">Test Required</th>
                                            <th width="20.34%" rowSpan="2">Results</th>
                                            <th width="20.34%" rowSpan="2">Flag</th>
                                            <th width="10%" rowSpan="2">Units</th>
                                            <th colSpan="3">Ranges</th>
                                        </tr>
                                        <tr>
                                            <th width="9%" className="text-centre">Male</th>
                                            <th width="9%">Female</th>
                                            <th width="9%">Children</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="%">GOT (AST)</td>
                                            <td width="%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="got_ast"
                                                    name="got_ast"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td width="%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="got_ast_flag"
                                                    name="got_ast_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="%">U/L</td>
                                            <td width="%">(0.0 - 38)</td>
                                            <td width="%">(0.0 - 31)</td>
                                            <td width="%"></td>
                                        </tr>
                                        <tr>
                                            <td>GPT (ALT)</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="gpt_alt"
                                                    name="gpt_alt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gpt_alt_flag"
                                                    name="gpt_alt_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>U/L</td>
                                            <td>(0.0 - 41)</td>
                                            <td>(0.0 - 31)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Alkaline Aphos</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="alkaline_phos"
                                                    name="alkaline_phos"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="alkaline_phos_flag"
                                                    name="alkaline_phos_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>U/L</td>
                                            <td>(0.0 - 270)</td>
                                            <td>(0.0 - 240)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>GGT</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ggt"
                                                    name="ggt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ggt_flag"
                                                    name="ggt_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>U/L</td>
                                            <td>(11 - 50)</td>
                                            <td>(7 - 32)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Bilirubin Total</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bilirubin_total"
                                                    name="bilirubin_total"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bilirubin_total_flag"
                                                    name="bilirubin_total_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>umol/L</td>
                                            <td>(0 - 21)</td>
                                            <td>(0 - 21)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Bili, Indirect</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bili_indirect"
                                                    name="bili_indirect"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bili_indirect_flag"
                                                    name="bili_indirect_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>umol/L</td>
                                            <td>(0 - 4.3)</td>
                                            <td>(0 - 4.3)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Bilirubin Direct</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bilirubin_direct"
                                                    name="bilirubin_direct"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bilirubin_direct_flag"
                                                    name="bilirubin_direct_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>umol/L</td>
                                            <td>(2 - 11)</td>
                                            <td>(2 - 11)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Protein Total</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="protein_total"
                                                    name="protein_total"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="protein_total_flag"
                                                    name="protein_total_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>g/L</td>
                                            <td>(66 - 87)</td>
                                            <td>(56 - 86)</td>
                                            <td>(56 - 86)</td>
                                        </tr>
                                        <tr>
                                            <td>Albumin</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="albumin"
                                                    name="albumin"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="albumin_flag"
                                                    name="albumin_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>g/L</td>
                                            <td>(32 - 52)</td>
                                            <td>(32 - 52)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Globulin</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="globulin"
                                                    name="globulin"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="globulin_flag"
                                                    name="globulin_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>g/dL</td>
                                            <td>(20 - 48)</td>
                                            <td>(20 - 48)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
                                            <td colSpan="6">
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

export default EditBueLFT;

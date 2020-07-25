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
import { getTodaysDate, getFlagOptions } from '../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    sodium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    sodium_flag: Yup
        .string()
        .required('Please Select Flag'),
    potassium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    potassium_flag: Yup
        .string()
        .required('Please Select Flag'),
    chloride: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    chloride_flag: Yup
        .string()
        .required('Please Select Flag'),
    urea: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    urea_flag: Yup
        .string()
        .required('Please Select Flag'),
    creatinine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    creatinine_flag: Yup
        .string()
        .required('Please Select Flag'),
    got_ast: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    got_ast_flag: Yup
        .string()
        .required('Please Select Flag'),
    gpt_alt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    gpt_alt_flag: Yup
        .string()
        .required('Please Select Flag'),
    alkaline_phos: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    alkaline_phos_flag: Yup
        .string()
        .required('Please Select Flag'),
    ggt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    ggt_flag: Yup
        .string()
        .required('Please Select Flag'),
    bilirubin_total: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    bilirubin_total_flag: Yup
        .string()
        .required('Please Select Flag'),
    bili_indirect: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    bili_indirect_flag: Yup
        .string()
        .required('Please Select Flag'),
    bilirubin_direct: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    bilirubin_direct_flag: Yup
        .string()
        .required('Please Select Flag'),
    protein_total: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    protein_total_flag: Yup
        .string()
        .required('Please Select Flag'),
    albumin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    albumin_flag: Yup
        .string()
        .required('Please Select Flag'),
    globulin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    globulin_flag: Yup
        .string()
        .required('Please Select Flag'),
    cholesterol_total: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    cholesterol_total_flag: Yup
        .string()
        .required('Please Select Flag'),
    triglycerides: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    triglycerides_flag: Yup
        .string()
        .required('Please Select Flag'),
    hdl: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    hdl_flag: Yup
        .string()
        .required('Please Select Flag'),
    ldl: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    ldl_flag: Yup
        .string()
        .required('Please Select Flag'),
    coronary_risk: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    coronary_risk_flag: Yup
        .string()
        .required('Please Select Flag'),
    uric_acid: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    uric_acid_flag: Yup
        .string()
        .required('Please Select Flag'),
    fbs: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result'),
    fbs_flag: Yup
        .string()
        .required('Please Select Flag'),
    comments: Yup
        .string()
});

function AddCompactChemistry({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        sodium     : '',
        sodium_flag : '',
        chloride: '',
        chloride_flag : '',
        potassium: '',
        potassium_flag : '',
        urea: '',
        urea_flag : '',
        creatinine: '',
        creatinine_flag : '',
        egfr   : '',
        got_ast: '',
        got_ast_flag : '',
        gpt_alt: '',
        gpt_alt_flag : '',
        alkaline_phos: '',
        alkaline_phos_flag : '',
        ggt: '',
        ggt_flag : '',
        bilirubin_total: '',
        bilirubin_total_flag : '',
        bili_indirect: '',
        bili_indirect_flag : '',
        bilirubin_direct: '',
        bilirubin_direct_flag : '',
        protein_total: '',
        protein_total_flag : '',
        albumin: '',
        albumin_flag : '',
        globulin: '',
        globulin_flag : '',
        cholesterol_total: '',
        cholesterol_total_flag : '',
        triglycerides: '',
        triglycerides_flag : '',
        hdl: '',
        hdl_flag : '',
        ldl: '',
        ldl_flag : '',
        coronary_risk: '',
        coronary_risk_flag : '',
        uric_acid: '',
        uric_acid_flag : '',
        fbs: '',
        fbs_flag : '',
        comments   : '',
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

    const handleClose  = () => { setOpen(false); closeModal('compactchemistry'); };
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

        Axios.post(getBaseURL()+'add_compact_chemistry', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('compactchemistry'); }, 1050);
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
                                Add Compact Chemistry
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
                                    <thead>
                                        <tr>
                                            <td colSpan="6" className="text-centre">
                                                <p className="caption">bue + creatinine</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowSpan="2">Parameter</th>
                                            <th rowSpan="2">Results</th>
                                            <th rowSpan="2">Units</th>
                                            <th rowSpan="2">Flag</th>
                                            <th colSpan="2">Reference Range</th>
                                        </tr>
                                        <tr>
                                            <th className="text-centre">Male<br />Low - High</th>
                                            <th>Female<br />Low - High</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="23.34%">Sodium</td>
                                            <td width="18.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="sodium"
                                                    name="sodium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="11%">mmol/L</td>
                                            <td width="18.67%">
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
                                            <td width="12.67%">(135- 150</td>
                                            <td width="12.67%">(135- 150</td>
                                        </tr>
                                        <tr>
                                            <td>Potassium (Plasma/Urea</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="potassium"
                                                    name="potassium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
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
                                            <td>3.5 - 65.5</td>
                                            <td>3.5 - 65.5</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
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
                                            <td>96 - 110</td>
                                            <td>96 - 110</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
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
                                            <td>2.1 - 7.1</td>
                                            <td>2.1 - 7.1</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
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
                                            <td>71 - 115</td>
                                            <td>53 - 106</td>
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
                                            <th width="10%" rowSpan="2">Units</th>
                                            <th width="20.34%" rowSpan="2">Flag</th>
                                            <th colSpan="2">Ranges</th>
                                        </tr>
                                        <tr>
                                            <th className="text-centre">Male<br />Low - High</th>
                                            <th>Female<br />Low - High</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>GOT (AST</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="got_ast"
                                                    name="got_ast"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/L</td>
                                            <td>
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
                                            <td>0.0 - 38</td>
                                            <td>0.0 - 31</td>
                                        </tr>
                                        <tr>
                                            <td>GPT (ALT</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="gpt_alt"
                                                    name="gpt_alt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/L</td>
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
                                            <td>0.0 - 41</td>
                                            <td>0.0 - 31</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/L</td>
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
                                            <td>0.0 - 270</td>
                                            <td>0.0 - 240</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/L</td>
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
                                            <td>11 - 50</td>
                                            <td>7 - 32</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>umol/L</td>
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
                                            <td>0 - 21</td>
                                            <td>0 - 21</td>
                                        </tr>
                                        <tr>
                                            <td>Bilirubin, Indirect</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="bili_indirect"
                                                    name="bili_indirect"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>umol/L</td>
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
                                            <td>0 - 4.3</td>
                                            <td>0 - 4.3</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>umol/L</td>
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
                                            <td>2 - 11</td>
                                            <td>2 - 11</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>g/L</td>
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
                                            <td>66 - 87</td>
                                            <td>56 - 86</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>g/L</td>
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
                                            <td>35 - 52</td>
                                            <td>35 - 52</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>g/dL</td>
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
                                            <td>20 - 48</td>
                                            <td>20 - 48</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table" className="mt-20">
                                    <thead>
                                        <tr>
                                            <td colSpan="7" className="text-centre">
                                                <p className="caption">LIPID PROFILE</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowSpan="2" width="23.67%">Test Required</th>
                                            <th rowSpan="2" width="20.67%">Results</th>
                                            <th rowSpan="2" width="10.67%">Units</th>
                                            <th rowSpan="2" width="20.67%">Flag</th>
                                            <th colSpan="2">Ranges</th>
                                        </tr>
                                        <tr>
                                            <th width="12.67%" className="text-centre">Male<br />Low - High</th>
                                            <th width="12.67%">Female<br />Low - High</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cholesterol, Total</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="cholesterol_total"
                                                    name="cholesterol_total"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="cholesterol_total_flag"
                                                    name="cholesterol_total_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>0.00 - 5.20</td>
                                            <td>0.00 - 5.20</td>
                                        </tr>
                                        <tr>
                                            <td>Triglycerides</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="triglycerides"
                                                    name="triglycerides"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="triglycerides_flag"
                                                    name="triglycerides_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>0.00 - 2.30</td>
                                            <td>0.00 - 2.30</td>
                                        </tr>
                                        <tr>
                                            <td>HDL</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="hdl"
                                                    name="hdl"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hdl_flag"
                                                    name="hdl_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>1.04 -2.10</td>
                                            <td>1.04 -2.10</td>
                                        </tr>
                                        <tr>
                                            <td>LDL</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ldl"
                                                    name="ldl"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ldl_flag"
                                                    name="ldl_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>0.00 - 3.88</td>
                                            <td>0.00 - 3.88</td>
                                        </tr>
                                        <tr>
                                            <td>Coronary Risk</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="coronary_risk"
                                                    name="coronary_risk"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>Ratio</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="coronary_risk_flag"
                                                    name="coronary_risk_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>0.00 - 4.00</td>
                                            <td>0.00 - 4.00</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table" className="mt-20">
                                    <thead>
                                        <tr>
                                            <td colSpan="7" className="text-centre">
                                                <p className="caption">GENERAL CHEMISTRY</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowSpan="2" width="23.67%">Parameter</th>
                                            <th rowSpan="2" width="20.67%">Results</th>
                                            <th rowSpan="2" width="10.67%">Units</th>
                                            <th rowSpan="2" width="20.67%">Flag</th>
                                            <th colSpan="2">Reference Range</th>
                                        </tr>
                                        <tr>
                                            <th width="12.67%" className="text-centre">Male<br />Low - High</th>
                                            <th width="12.67%">Female<br />Low - High</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Uric Acid</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="uric_acid"
                                                    name="uric_acid"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>umol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="uric_acid_flag"
                                                    name="uric_acid_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>208 - 428</td>
                                            <td>155 - 357</td>
                                        </tr>
                                        <tr>
                                            <td>FBS</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="fbs"
                                                    name="fbs"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="fbs_flag"
                                                    name="fbs_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>4.1 - 6.4</td>
                                            <td>4.1 - 6.4</td>
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

export default AddCompactChemistry;

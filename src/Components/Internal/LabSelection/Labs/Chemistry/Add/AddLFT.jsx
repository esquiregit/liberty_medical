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

function AddLFT({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
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

    const handleClose  = () => { setOpen(false); closeModal('lft'); };
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

        Axios.post(getBaseURL()+'add_lft', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('lft'); }, 1050);
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
                                Liver Function Test
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
                                            <th width="22.34%" rowSpan="2">Test Required</th>
                                            <th width="20.34%" rowSpan="2">Results</th>
                                            <th width="20.34%" rowSpan="2">Flag</th>
                                            <th width="10%" rowSpan="2">Units</th>
                                            <th colSpan="3">Ranges</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Children</th>
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

export default AddLFT;

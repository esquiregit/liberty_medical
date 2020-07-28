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
    urea_creatinine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    urea_creatinine_flag: Yup
        .string()
        .required('Please Select Flag'),
    micro_albumin_urine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    micro_albumin_urine_flag: Yup
        .string()
        .required('Please Select Flag'),
    uacr: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    uacr_flag: Yup
        .string()
        .required('Please Select Flag'),
    the_uacr: Yup
        .number()
        .min(0, 'Cannot Be Less Than 0')
        .required('Required'),
    comments: Yup
        .string()
});

function EditUrineACR({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.pfirst_name+' '+lab.pmiddle_name+' '+lab.plast_name,
        urea_creatinine : lab.urea_creatinine,
        urea_creatinine_flag : lab.urea_creatinine_flag,
        micro_albumin_urine : lab.micro_albumin_urine,
        micro_albumin_urine_flag : lab.micro_albumin_urine_flag,
        uacr : lab.uacr,
        uacr_flag : lab.uacr_flag,
        the_uacr : lab.the_uacr,
        mg_g_indicates : lab.mg_g_indicates,
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

    const handleClose  = () => { setOpen(false); closeModal('UrineACR'); };
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

        Axios.post(getBaseURL()+'edit_urine_acr', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('UrineACR'); }, 1050);
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
                    {({ isValid, dirty, resetForm, setFieldValue }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                URINE ALBUMIN CREATININE RATIO
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

                                <table id="lab-table">
                                    <thead>
                                        <tr>
                                            <th>Test Name</th>
                                            <th>Results</th>
                                            <th>Flag</th>
                                            <th>Units</th>
                                            <th>Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="19.34%">Urine Creatinine</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="urea_creatinine"
                                                    name="urea_creatinine"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="urea_creatinine_flag"
                                                    name="urea_creatinine_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="11%">mg/dl</td>
                                            <td width="18.67%">-</td>
                                        </tr>
                                        <tr>
                                            <td width="19.34%">Micro Albumin (Urine)</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="micro_albumin_urine"
                                                    name="micro_albumin_urine"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="micro_albumin_urine_flag"
                                                    name="micro_albumin_urine_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="11%">mg/dl</td>
                                            <td width="18.67%">0 - 25</td>
                                        </tr>
                                        <tr>
                                            <td width="19.34%">UACR</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="uacr"
                                                    name="uacr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="uacr_flag"
                                                    name="uacr_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="11%">mg/dl</td>
                                            <td width="18.67%">-</td>
                                        </tr>
                                        <tr>
                                            <td>The UACR</td>
                                            <td>
                                                <FormikTextField
                                                    onChange={event => {
                                                        const val = event.target.value;
                                                        if (val < 30) {
                                                            setFieldValue('mg_g_indicates', 'NORMAL');
                                                        } else if(val > 30 && val < 301) {
                                                            setFieldValue('mg_g_indicates', 'MICRO ALBUMINURIA');
                                                        } else if(val > 301) {
                                                            setFieldValue('mg_g_indicates', 'CLINICAL ALBUMINURIA');
                                                        }
                                                    }}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="the_uacr"
                                                    name="the_uacr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mg/g indicates</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    disabled={true}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="mg_g_indicates"
                                                    name="mg_g_indicates" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="5">
                                                <table id="detail-table">
                                                    <thead>
                                                        <tr>
                                                            <th className="text-centre">UACR REFERENCE VALUE</th>
                                                            <th className="text-centre">INTERPRETATION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td className="text-centre">&lt; 30 mg/g</td>
                                                            <td>NORMAL</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">30 - 300 mg/g</td>
                                                            <td>MICROALBUMIN</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">&gt; 300 mg/g</td>
                                                            <td>CLINICAL ALBUMIN</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="5" className="text-centre pt-20 pb-20">
                                                Comment: Microalbumin is a term used to describe albumin level not detected by a dipstick test. Albumin is used to diagnose and monitor kidney disease. Change in albumin may reflect response to therapy and risk for progression. A decrease in urine albumin may be due to improved renal and cardiovascular outcomes.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
                                            <td colSpan="4">
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

export default EditUrineACR;

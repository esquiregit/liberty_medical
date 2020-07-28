import React, { useState } from 'react';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../../../../Extras/styles';
import Toastrr from '../../../../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import ConfirmDialogue from '../../../../../Extras/ConfirmDialogue';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../../../../Extras/server';
import { Form, Formik } from 'formik';
import { useSelector } from 'react-redux';
import { getTodaysDate } from '../../../../../Extras/Functions';
import { FormikTextField } from 'formik-material-fields';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    ast: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    alt: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    creatinine_kinase: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    ck_mb: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    ldh: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    troponin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    comments: Yup
        .string()
});

function EditCardiacEnzyme({ lab, closeModal }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();
    
    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.name,
        ast : lab.ast,
        alt : lab.alt,
        creatinine_kinase : lab.creatinine_kinase,
        ck_mb : lab.ck_mb,
        ldh : lab.ldh,
        troponin : lab.troponin,
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

    const handleClose  = () => { setOpen(false); closeModal('cardiacenzyme'); };
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

        Axios.post(getBaseURL()+'edit_cardiac_enzyme', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('cardiacenzyme'); }, 1050);
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
                    onSubmit={onConfirm} >
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                Cardiac Enzyme
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
                                    <thead>
                                        <tr>
                                            <th>Test Required</th>
                                            <th>Results</th>
                                            <th>Unit</th>
                                            <th>Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="19.34%">AST</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ast"
                                                    name="ast"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="11%">U/L</td>
                                            <td width="18.67%">(0 - 35)</td>
                                        </tr>
                                        <tr>
                                            <td width="19.34%">ALT</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="alt"
                                                    name="alt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="11%">U/L</td>
                                            <td width="18.67%">(0 - 35)</td>
                                        </tr>
                                        <tr>
                                            <td>Creatinine Kinase</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="creatinine_kinase"
                                                    name="creatinine_kinase"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/mL</td>
                                            <td>(50 - 170)</td>
                                        </tr>
                                        <tr>
                                            <td>CK-MB</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ck_mb"
                                                    name="ck_mb"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>ng/mL</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>LDH</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ldh"
                                                    name="ldh"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>U/mL</td>
                                            <td>(0 - 480)</td>
                                        </tr>
                                        <tr>
                                            <td>Troponin</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="troponin"
                                                    name="troponin"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>ng/mL</td>
                                            <td>&lt; 8</td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
                                            <td colSpan="3">
                                                <FormikTextField
                                                    multiline
                                                    rows={4}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="comments"
                                                    name="comments" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Information</td>
                                            <td className="text-centre" colSpan="3">
                                                CK-MB results are considered positive for myocardial infarction when the following criteria are met.<br /><br />
                                                &bull;CK-MB value &ge; 16u/L<br />
                                                &bull;CK-MB results should fall between 4% and 25% of total CK. If %CK-MB is outside this range, the elevation may have arisen from factors other than mycardial infarction<br />
                                                &bull;A rise in CK-MB activity to peak approximately 18 hours after the infarction and a subsequent fall in activity is characteristic of mycardial infarction
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

export default EditCardiacEnzyme;

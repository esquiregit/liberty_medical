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
    bt: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    pt_inr: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    aptt: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    control_time: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    normal_plasma: Yup
        .string()
        .required('Required'),
    ratio: Yup
        .string()
        .required('Required'),
    inr: Yup
        .string()
        .required('Required'),
    factor_viii_assay: Yup
        .string()
        .required('Required'),
    factor_ix_activity: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditClottingProfile({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.name,
        fungal_element : lab.fungal_element,
        bt : lab.bt,
        pt_inr : lab.pt_inr,
        aptt : lab.aptt,
        control_time : lab.control_time,
        normal_plasma : lab.normal_plasma,
        ratio : lab.ratio,
        inr : lab.inr,
        factor_viii_assay : lab.factor_viii_assay,
        factor_ix_activity : lab.factor_ix_activity,
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

    const handleClose  = () => { setOpen(false); closeModal('ClottingProfile'); };
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

        Axios.post(getBaseURL()+'edit_clotting_profile', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('ClottingProfile'); }, 1050);
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
                                Clotting Profile
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
                                            <th>Test Name</th>
                                            <th>Results</th>
                                            <th>Unit</th>
                                            <th>Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td className="text-left">BT</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bt"
                                                    name="bt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>mis</td>
                                            <td>2 - 7 mins</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">APTT</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="aptt"
                                                    name="aptt"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>sec</td>
                                            <td>26 - 36</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Normal Plasma</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="normal_plasma"
                                                    name="normal_plasma"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>sec</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">PT (INR)</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pt_inr"
                                                    name="pt_inr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>sec</td>
                                            <td>11 - 16</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Control Time</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="control_time"
                                                    name="control_time"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Ratio</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ratio"
                                                    name="ratio"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">INR</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="inr"
                                                    name="inr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Factor VIII Assay</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="factor_viii_assay"
                                                    name="factor_viii_assay"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>50 - 150</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Factor IX Activity</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="factor_ix_activity"
                                                    name="factor_ix_activity"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>50 - 150</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Comments</td>
                                            <td colSpan="3">
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

export default EditClottingProfile;

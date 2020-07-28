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
import { FormikTextField } from 'formik-material-fields';
import { getTodaysDate } from '../../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    date_of_injection: Yup
        .string()
        .required('Required'),
    date_of_reading: Yup
        .string()
        .required('Required'),
    size_of_induration: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditMantoux({ lab, closeModal, closeExpandable }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        date_of_injection : lab.date_of_injection,
        date_of_reading : lab.date_of_reading,
        size_of_induration : lab.size_of_induration,
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

    const handleClose  = () => { setOpen(false); closeModal('mantoux'); };
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

        Axios.post(getBaseURL()+'edit_mantoux', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('mantoux'); }, 1050);
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
                                mantoux
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
                                            <td width="15%"></td>
                                            <td width="30%" className="text-right pr-20">Date of Injection</td>
                                            <td width="35%">
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="date_of_injection"
                                                    name="date_of_injection"
                                                    type="date" />
                                            </td>
                                            <td width="20%"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-right pr-20">Date of Reading</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="date_of_reading"
                                                    name="date_of_reading"
                                                    type="date" />
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-right pr-20">Size of Induration in mm</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="size_of_induration"
                                                    name="size_of_induration"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-right pr-20">Comments</td>
                                            <td>
                                                <FormikTextField
                                                    multiline
                                                    rows={3}
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="comments"
                                                    name="comments" />
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colSpan="2">
                                                <table id="detail-table">
                                                    <thead>
                                                        <tr>
                                                            <th className="text-centre" width="30%">INDURATION (MM)</th>
                                                            <th className="text-centre">INTERPRETATION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td className="text-centre">0 - 5</td>
                                                            <td className="text-centre">
                                                                Non significant reaction
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">6 - 15</td>
                                                            <td className="text-centre">
                                                                More likely to be due to previous BCG vaccination or infection with environmental mycobacteria than to TB infection
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">&gt; 15</td>
                                                            <td className="text-centre">
                                                                Unlikely to be due to previous BCG vaccination or exposed environmental mycobacteria
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="pt-30" colSpan="4">
                                                NOTE<br /><br />
                                                Viral infections, especially HIV, can cause false negative reactions. Other factors that can weaken the Mantoux reaction include severe TB disease, renal failure and diabetes, treatment with immunosuppressive drugs, old age or newborn infants.
                                            </th>
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

export default EditMantoux;

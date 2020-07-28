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
    s_c3: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    s_c4: Yup
        .string()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result')
});

function EditSC3SC4({ lab, closeModal }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.name,
        s_c3 : lab.s_c3,
        s_c4 : lab.s_c4,
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

    const handleClose  = () => { setOpen(false); closeModal('SC3SC4'); };
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

        Axios.post(getBaseURL()+'edit_sc3_sc4', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('SC3SC4'); }, 1050);
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
                            <DialogTitle id="customized-dialog-title" onClose={handleClose}>
                                BIOCHEMISTRY (S-C3, S-C4)
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
                                            <td width="19.34%">S-C3</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="s_c3"
                                                    name="s_c3"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="11%">mg/dl</td>
                                            <td width="18.67%">
                                                NEONATES (70 - 196)<br />
                                                ADULTS (90 - 180)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>S-C4</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="s_c4"
                                                    name="s_c4"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>+ mg/dl</td>
                                            <td>
                                                NEONATES (13 - 38)<br />
                                                ADULTS (10 - 40)
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </DialogContent>
                            <DialogActions>
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

export default EditSC3SC4;

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
import { getTodaysDate, getWidals } from '../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    typhi_to: Yup
        .string()
        .required('Required'),
    typhi_th: Yup
        .string()
        .required('Required'),
    paratyphi_a_to: Yup
        .string()
        .required('Required'),
    paratyphi_a_th: Yup
        .string()
        .required('Required'),
    paratyphi_b_to: Yup
        .string()
        .required('Required'),
    paratyphi_b_th: Yup
        .string()
        .required('Required'),
    paratyphi_c_to: Yup
        .string()
        .required('Required'),
    paratyphi_c_th: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditWidal({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.pfirst_name+' '+lab.pmiddle_name+' '+lab.plast_name,
        typhi_to : lab.typhi_to,
        typhi_th : lab.typhi_th,
        paratyphi_a_to : lab.paratyphi_a_to,
        paratyphi_a_th : lab.paratyphi_a_th,
        paratyphi_b_to : lab.paratyphi_b_to,
        paratyphi_b_th : lab.paratyphi_b_th,
        paratyphi_c_to : lab.paratyphi_c_to,
        paratyphi_c_th : lab.paratyphi_c_th,
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

    const handleClose  = () => { setOpen(false); closeModal('Widal'); };
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

        Axios.post(getBaseURL()+'edit_widal', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('Widal'); }, 1050);
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
                                Widal
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
                                    <tbody>
                                        <tr>
                                            <td width="20%" className="text-left">Typhi</td>
                                            <td width="10%" className="text-left">TO</td>
                                            <td width="30%" className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="typhi_to"
                                                    name="typhi_to">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="10%" className="text-left">TH</td>
                                            <td width="30%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="typhi_th"
                                                    name="typhi_th">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" className="text-left">Paratyphi A</td>
                                            <td width="10%" className="text-left">TO</td>
                                            <td width="30%" className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_a_to"
                                                    name="paratyphi_a_to">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="10%" className="text-left">TH</td>
                                            <td width="30%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_a_th"
                                                    name="paratyphi_a_th">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" className="text-left">Paratyphi B</td>
                                            <td width="10%" className="text-left">TO</td>
                                            <td width="30%" className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_b_to"
                                                    name="paratyphi_b_to">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="10%" className="text-left">TH</td>
                                            <td width="30%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_b_th"
                                                    name="paratyphi_b_th">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" className="text-left">Paratyphi C</td>
                                            <td width="10%" className="text-left">TO</td>
                                            <td width="30%" className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_c_to"
                                                    name="paratyphi_c_to">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="10%" className="text-left">TH</td>
                                            <td width="30%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="paratyphi_c_th"
                                                    name="paratyphi_c_th">
                                                    {getWidals().map((widal, index) => (
                                                        <MenuItem key={index} value={widal.value}>
                                                            {widal.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
                                            <td colSpan="4">
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

export default EditWidal;

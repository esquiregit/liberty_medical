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
import { getTodaysDate, get_rhesus_options } from '../../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    hbsag: Yup
        .string()
        .required('Required'),
    hbsab: Yup
        .string()
        .required('Required'),
    hbeag: Yup
        .string()
        .required('Required'),
    hbeab: Yup
        .string()
        .required('Required'),
    hbcab: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditHepatitisBProfile({ lab, closeModal, closeExpandable }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        hbsag : lab.hbsag,
        hbsab : lab.hbsab,
        hbeag : lab.hbeag,
        hbeab : lab.hbeab,
        hbcab : lab.hbcab,
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

    const handleClose  = () => { setOpen(false); closeModal('hepatitisbprofile'); };
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

        Axios.post(getBaseURL()+'edit_hepatitis_b_profile', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('hepatitisbprofile'); }, 1050);
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
                                HEPATITIS B PROFILE
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
                                            <td width="25%" className="text-right pr-20">HBsAg</td>
                                            <td width="50%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hbsag"
                                                    name="hbsag">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" className="text-right pr-20">HBsAb</td>
                                            <td width="50%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hbsab"
                                                    name="hbsab">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" className="text-right pr-20">HBeAg</td>
                                            <td width="50%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hbeag"
                                                    name="hbeag">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" className="text-right pr-20">HBeAb</td>
                                            <td width="50%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hbeab"
                                                    name="hbeab">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" className="text-right pr-20">HBcAb</td>
                                            <td width="50%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hbcab"
                                                    name="hbcab">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <th colSpan="3" className="text-centre">
                                                INTERPRETATION OF HEPATITIS B SEROLOGICAL TEST
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colSpan="3">
                                                <table id="detail-table">
                                                    <thead>
                                                        <tr>
                                                            <th className="text-centre" width="10.67%">HBsAg</th>
                                                            <th className="text-centre" width="10.67%">HBsAb</th>
                                                            <th className="text-centre" width="10.67%">HBeAg</th>
                                                            <th className="text-centre" width="10.67%">HBeAb</th>
                                                            <th className="text-centre" width="10.67%">HBcAb</th>
                                                            <th className="text-centre" width="46.67%">Interpretation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-left">
                                                                EARLY PHASE OF ACUTE INFECTION, HIGHLY INFECTIOUS
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-left">
                                                                LATER PHASE OF ACUTE INFECTION
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-left">
                                                                RECOVERY WITH IMMUNITY (PAST INFECTION)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-left">
                                                                SUCCESSFUL VACCINATION, NO PAST INFECTION
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-left">
                                                                CHRONIC INFECTION WITH ACTIVE REPRODUCTION, HIGHLY INFECTIOUS
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">+</td>
                                                            <td className="text-left">
                                                                CHRONIC INFECTION IN THE INACTIVE PHASE
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-centre">+/-</td>
                                                            <td className="text-centre">-</td>
                                                            <td className="text-left">
                                                                NO PAST INFECTION, NO IMMUNITY
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
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

export default EditHepatitisBProfile;

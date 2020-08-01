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
    hep_a_igg_antibody: Yup
        .string()
        .required('Required'),
    hep_b_core_igm_antibody: Yup
        .string()
        .required('Required'),
    hep_a_igm_antibody: Yup
        .string()
        .required('Required'),
    hep_be_antigen: Yup
        .string()
        .required('Required'),
    hep_bs_antigen: Yup
        .string()
        .required('Required'),
    hep_be_antibody: Yup
        .string()
        .required('Required'),
    hep_bs_antibody: Yup
        .string()
        .required('Required'),
    hep_c_screen: Yup
        .string()
        .required('Required'),
    hep_b_core_igg_antibody: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditHepatitisMarkers({ lab, closeModal, closeExpandable }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        hep_a_igg_antibody : lab.hep_a_igg_antibody,
        hep_b_core_igm_antibody : lab.hep_b_core_igm_antibody,
        hep_a_igm_antibody : lab.hep_a_igm_antibody,
        hep_be_antigen : lab.hep_be_antigen,
        hep_bs_antigen : lab.hep_bs_antigen,
        hep_be_antibody : lab.hep_be_antibody,
        hep_bs_antibody : lab.hep_bs_antibody,
        hep_c_screen : lab.hep_c_screen,
        hep_b_core_igg_antibody : lab.hep_b_core_igg_antibody,
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

    const handleClose  = () => { setOpen(false); closeModal('HepatitisMarkers'); };
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

        Axios.post(getBaseURL()+'edit_hepatitis_markers', values, { signal: signal })
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
                    onSubmit={onConfirm} >
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle id="customized-dialog-title" onClose={handleClose}>
                                Hepatitis Markers
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
                                            <th width="20%">Test Name</th>
                                            <th width="20%">Results</th>
                                            <th width="20%">Test Name</th>
                                            <th width="20%">Results</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td className="text-left">Hep A IgG Antibody</td>
                                            <td className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_a_igg_antibody"
                                                    name="hep_a_igg_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left">Hep B Core IgM Antibody</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_b_core_igm_antibody"
                                                    name="hep_b_core_igm_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Hep A IgM Antibody</td>
                                            <td className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_a_igm_antibody"
                                                    name="hep_a_igm_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left">Hep Be Antigen</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_be_antigen"
                                                    name="hep_be_antigen">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Hep Bs Antigen</td>
                                            <td className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_bs_antigen"
                                                    name="hep_bs_antigen">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left">Hep Be Antibody</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_be_antibody"
                                                    name="hep_be_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Hep Bs Antibody</td>
                                            <td className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_bs_antibody"
                                                    name="hep_bs_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left">Hep C Screen</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_c_screen"
                                                    name="hep_c_screen">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Hep B Core IgG Antibody</td>
                                            <td className="pr-15">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="hep_b_core_igg_antibody"
                                                    name="hep_b_core_igg_antibody">
                                                    {get_rhesus_options().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
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

export default EditHepatitisMarkers;

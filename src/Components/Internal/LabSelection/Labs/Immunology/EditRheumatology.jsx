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
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../Extras/Dialogue';
import { getTodaysDate, get_rhesus_options, getStoolReAllFourthColumns } from '../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    le_cells: Yup
        .string()
        .required('Required'),
    ana_qualitative: Yup
        .string()
        .required('Required'),
    ana_quantitative: Yup
        .string()
        .required('Required'),
    ds_dna: Yup
        .string()
        .required('Required'),
    rheumatoid_factor: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditRheumatology({ lab, closeModal }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.name,
        le_cells : lab.le_cells,
        ana_qualitative : lab.ana_qualitative,
        ana_quantitative : lab.ana_quantitative,
        ds_dna : lab.ds_dna,
        rheumatoid_factor : lab.rheumatoid_factor,
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

    const handleClose  = () => { setOpen(false); closeModal('Rheumatology'); };
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

        Axios.post(getBaseURL()+'edit_rheumatology', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('Rheumatology'); }, 1050);
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
                                Rheumatology
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
                                            <td width="25%"></td>
                                            <td width="25%">LE Cells</td>
                                            <td width="25%">
                                                <FormikTextField
                                                    select
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="le_cells"
                                                    name="le_cells">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td> 
                                            <td width="25%"></td>   
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ANA (Qualitative)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ana_qualitative"
                                                    name="ana_qualitative">
                                                    {get_rhesus_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>    
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ANA (Quantitative)</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ana_quantitative"
                                                    name="ana_quantitative">
                                                    {get_rhesus_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td> 
                                            <td></td>   
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ds DNA</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="ds_dna"
                                                    name="ds_dna">
                                                    {get_rhesus_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td> 
                                            <td></td>   
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Rheumatoid Factor</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="rheumatoid_factor"
                                                    name="rheumatoid_factor">
                                                    {get_rhesus_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td> 
                                            <td></td>   
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

export default EditRheumatology;

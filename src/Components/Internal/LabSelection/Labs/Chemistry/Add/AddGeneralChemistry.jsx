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
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import { getTodaysDate } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    amylase: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    ldh: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    creatinine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    uric_acid: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    creatine_kinase: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    calcium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    phosphorus: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    magnessium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    fbs_glucose: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    globulin: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    bili_indirect: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    glyco_hbg: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    comments: Yup
        .string()
});

function AddGeneralChemistry({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        amylase    : '',
        ldh    : '',
        uric_acid   : '',
        creatinine   : '',
        creatine_kinase   : '',
        calcium   : '',
        phosphorus   : '',
        magnessium   : '',
        fbs_glucose   : '',
        bili_indirect   : '',
        glyco_hbg   : '',
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

    const handleClose  = () => { setOpen(false); closeModal('generalChemistry'); };
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

        Axios.post(getBaseURL()+'add_general_chemistry', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('generalChemistry'); }, 1050);
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
                    onSubmit={onConfirm} >
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                General Chemistry
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

                                <table id="lab-table">
                                    <thead>
                                        <tr>
                                            <th width="25%">Test Required</th>
                                            <th width="25%">Results</th>
                                            <th width="25%">Unit</th>
                                            <th width="25%">Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Amylase</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="amylase"
                                                    name="amylase"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>U/L</td>
                                            <td className="text-centre">(0 - 100)</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>U/L</td>
                                            <td className="text-centre">(0 - 480)</td>
                                        </tr>
                                        <tr>
                                            <td>Creatine Kinase</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="creatine_kinase"
                                                    name="creatine_kinase"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>U/L</td>
                                            <td className="text-centre">(24 - 170)</td>
                                        </tr>
                                        <tr>
                                            <td>Creatinine</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="creatinine"
                                                    name="creatinine"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>umol/L</td>
                                            <td className="text-centre">(53.04 - 123.8)</td>
                                        </tr>
                                        <tr>
                                            <td>Uric Acid</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="uric_acid"
                                                    name="uric_acid"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>umol/L</td>
                                            <td className="text-centre">(154 - 357)</td>
                                        </tr>
                                        <tr>
                                            <td>Calcium</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="calcium"
                                                    name="calcium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td className="text-centre">(2.12 - 2.60)</td>
                                        </tr>
                                        <tr>
                                            <td>Phosphorus</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="phosphorus"
                                                    name="phosphorus"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td className="text-centre">(0.80 - 1.55)</td>
                                        </tr>
                                        <tr>
                                            <td>Magnessium</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="magnessium"
                                                    name="magnessium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td className="text-centre"></td>
                                        </tr>
                                        <tr>
                                            <td>FBS Glucose</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="fbs_glucose"
                                                    name="fbs_glucose"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td className="text-centre">(3.4 - 6.4)</td>
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
                                            <td>g/dL</td>
                                            <td className="text-centre">(2.0 - 4.8)</td>
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
                                            <td>umol/L</td>
                                            <td className="text-centre">(1.5 - 17.5)</td>
                                        </tr>
                                        <tr>
                                            <td>% Glyco-HBG</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="glyco_hbg"
                                                    name="glyco_hbg"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>%</td>
                                            <td className="text-centre">(4.5 - 7.0)</td>
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

export default AddGeneralChemistry;

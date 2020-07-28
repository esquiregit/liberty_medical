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
import { getTodaysDate, getPhs, getSemenColours, getConsistencys } from '../../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    volume: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    motility: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    unknown_one: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    unknown_two: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    consistency: Yup
        .string()
        .required('Required'),
    agglutination: Yup
        .string()
        .required('Required'),
    ph: Yup
        .string()
        .required('Required'),
    count: Yup
        .string()
        .required('Required'),
    colour: Yup
        .string()
        .required('Required'),
    viability: Yup
        .string()
        .required('Required'),
    morphology: Yup
        .string()
        .required('Required'),
    testicular_cells: Yup
        .string()
        .required('Required'),
    pus_cells: Yup
        .string()
        .required('Required'),
    epithelial: Yup
        .string()
        .required('Required'),
    red_blood_cells: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function AddSemenAnalysis({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        fungal_element     : '',
        volume: '',
        motility: '',
        unknown_one: '',
        unknown_two: '',
        consistency: '',
        agglutination: '',
        ph: '',
        count: '',
        colour: '',
        viability: '',
        morphology: '',
        testicular_cells: '',
        pus_cells: '',
        epithelial: '',
        red_blood_cells: '',
        comments: '',
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

    const handleClose  = () => { setOpen(false); closeModal('SemenAnalysis'); };
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

        Axios.post(getBaseURL()+'add_semen_analysis', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('SemenAnalysis'); }, 1050);
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
                    onSubmit={onConfirm}>
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                Semen Analysis
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
                                    <tbody>
                                        <tr>
                                            <td className="text-left">Volume</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="volume"
                                                    name="volume"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>mls</td>
                                            <td>1.5 - 5mls</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Motility</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="motility"
                                                    name="motility"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>
                                                Active Linear Forward Progression &gt; 50%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="unknown_one"
                                                    name="unknown_one"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>Sluggish (Less Than 20%)</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="unknown_two"
                                                    name="unknown_two"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>Immotile (Less Than 30%)</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Consistency</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="consistency"
                                                    name="consistency">
                                                    {getConsistencys().map((flag, index) => (
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
                                            <td className="text-left">Agglutination</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="agglutination"
                                                    name="agglutination"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td></td>
                                            <td>None</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">pH</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ph"
                                                    name="ph">
                                                    {getPhs().map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td>7.2 - 7.8</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Colour</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="colour"
                                                    name="colour">
                                                    {getSemenColours().map((flag, index) => (
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
                                            <td className="text-left">Count</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="count"
                                                    name="count"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>mls</td>
                                            <td>&gt; 20 - 150 millions/mls</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Viability</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="viability"
                                                    name="viability"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>%</td>
                                            <td>Live Spematozoa (&gt; 75%)</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Morphology</td>
                                            <td colSpan="3">
                                                <FormikTextField
                                                    multiline
                                                    rows={3}
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="morphology"
                                                    name="morphology" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Testicular Cells</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="testicular_cells"
                                                    name="testicular_cells"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>per HPF</td>
                                            <td>Less Than 10</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Pus Cells</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pus_cells"
                                                    name="pus_cells"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>per HPF</td>
                                            <td>Less Than 5</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Epithelial</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="epithelial"
                                                    name="epithelial"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>per HPF</td>
                                            <td>Less Than 5</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Red Blood Cells</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="red_blood_cells"
                                                    name="red_blood_cells"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 }}} />
                                            </td>
                                            <td>per HPF</td>
                                            <td>Less Than 5</td>
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

export default AddSemenAnalysis;

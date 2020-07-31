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
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../../Extras/Dialogue';
import { getTodaysDate, getGramStains, getAppearances } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    colour: Yup
        .string()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    appearance: Yup
        .string()
        .required('Required'),
    appearance_dropdown: Yup
        .string()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    gram_stain: Yup
        .string()
        .required('Required'),
    acid_fast_bacilli: Yup
        .string()
        .required('Required'),
    ph: Yup
        .string()
        .required('Required'),
    glucose: Yup
        .string()
        .required('Required'),
    total_protein: Yup
        .string()
        .required('Required'),
    pleural_fluid_albumin: Yup
        .string()
        .required('Required'),
    ldh: Yup
        .string()
        .required('Required'),
    total_wbc_one: Yup
        .string()
        .required('Required'),
    total_wbc_two: Yup
        .string()
        .required('Required'),
    lymphocytes_one: Yup
        .string()
        .required('Required'),
    lymphocytes_two: Yup
        .string()
        .required('Required'),
    monocytes_one: Yup
        .string()
        .required('Required'),
    monocytes_two: Yup
        .string()
        .required('Required'),
    granulocytes_one: Yup
        .string()
        .required('Required'),
    granulocytes_two: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditPleuralFluid({ lab, closeModal, closeExpandable }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const appearances = getAppearances();
    const gramStains  = getGramStains();

    const initialValues = {
        id         : lab.id,
        patient_id : lab.patient_id,
        patient    : lab.name,
        colour : lab.colour,
        appearance : lab.appearance,
        appearance_dropdown : lab.appearance_dropdown,
        gram_stain : lab.gram_stain,
        acid_fast_bacilli : lab.acid_fast_bacilli,
        ph : lab.ph,
        glucose : lab.glucose,
        total_protein : lab.total_protein,
        pleural_fluid_albumin : lab.pleural_fluid_albumin,
        ldh : lab.ldh,
        total_wbc_one : lab.total_wbc_one,
        total_wbc_two : lab.total_wbc_two,
        lymphocytes_one : lab.lymphocytes_one,
        lymphocytes_two : lab.lymphocytes_two,
        monocytes_one : lab.monocytes_one,
        monocytes_two : lab.monocytes_two,
        granulocytes_one : lab.granulocytes_one,
        granulocytes_two : lab.granulocytes_two,
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

    const handleClose  = () => { setOpen(false); closeModal('PleuralFluid'); };
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

        Axios.post(getBaseURL()+'edit_pleural_fluid', values, { signal: signal })
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
                    onSubmit={onConfirm}>
                    {({ isValid, dirty, resetForm }) => (
                        <Form>
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                            pleural fluid ANALYSIS
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
                                            <td className="text-left">Colour</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="colour"
                                                    name="colour" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Appearance</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="appearance"
                                                    name="appearance" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Appearance</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="appearance_dropdown"
                                                    name="appearance_dropdown">
                                                    {appearances.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Gram Stain</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gram_stain"
                                                    name="gram_stain">
                                                    {gramStains.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Acid Bacilli Fast</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="acid_fast_bacilli"
                                                    name="acid_fast_bacilli" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="3" className="text-centre">
                                                <p className="caption mt-20">BIOCHEMISTRY</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Test Required</th>
                                            <th>Results</th>
                                            <th>Unit</th>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Ph</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ph"
                                                    name="ph"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Glucose</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="glucose"
                                                    name="glucose"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Total Protein</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="total_protein"
                                                    name="total_protein"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>g/L</td>
                                        </tr>
                                        <tr>
                                            <td width="20.33%" className="text-left">Pleural Fluid Albumin</td>
                                            <td width="59.33%">
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pleural_fluid_albumin"
                                                    name="pleural_fluid_albumin"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td width="20.33%">g/L</td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">LDH</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ldh"
                                                    name="ldh"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.01 } }} />
                                            </td>
                                            <td>U/L</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="lab-table">
                                    <tbody>
                                        <tr>
                                            <td colSpan="3" className="text-centre">
                                                <p className="caption mt-20">CELL COUNT</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Total WBC</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="total_wbc_one"
                                                    name="total_wbc_one" />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="total_wbc_two"
                                                    name="total_wbc_two" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Lymphocytes</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="lymphocytes_one"
                                                    name="lymphocytes_one" />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="lymphocytes_two"
                                                    name="lymphocytes_two" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Monocytes</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="monocytes_one"
                                                    name="monocytes_one" />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="monocytes_two"
                                                    name="monocytes_two" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Granulocytes</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="granulocytes_one"
                                                    name="granulocytes_one" />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="granulocytes_two"
                                                    name="granulocytes_two" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-left">Comments</td>
                                            <td colSpan="2">
                                                <FormikTextField
                                                    multiline
                                                    rows={3}
                                                    size="small"
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

export default EditPleuralFluid;

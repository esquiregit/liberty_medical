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
import { getTodaysDate, getAppearances, getBileSalt, getColoursTwo, getPhs, getSpecificGravityOptions, getProtein, getUrobilinogens, getTVaginalis, getBacterias, getCasts, getCrystals } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    epitheleal_cells_per_hpf: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    pus_cells_per_hps: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    rbcs_per_hpf: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    appearance: Yup
        .string()
        .required('Required'),
    colour: Yup
        .string()
        .required('Required'),
    ph: Yup
        .string()
        .required('Required'),
    specific_gravity: Yup
        .string()
        .required('Required'),
    protein: Yup
        .string()
        .required('Required'),
    leucocytes: Yup
        .string()
        .required('Required'),
    glucose: Yup
        .string()
        .required('Required'),
    urobilinogen: Yup
        .string()
        .required('Required'),
    blood: Yup
        .string()
        .required('Required'),
    ketones: Yup
        .string()
        .required('Required'),
    bilirubin: Yup
        .string()
        .required('Required'),
    nitrites: Yup
        .string()
        .required('Required'),
    bile_pigment: Yup
        .string()
        .required('Required'),
    bile_salt: Yup
        .string()
        .required('Required'),
    urobilin: Yup
        .string()
        .required('Required'),
    yeast_like_cells: Yup
        .string()
        .required('Required'),
    s_haematobium: Yup
        .string()
        .required('Required'),
    bacteria: Yup
        .string()
        .required('Required'),
    spermatozoa: Yup
        .string()
        .required('Required'),
    crystals: Yup
        .string()
        .required('Required'),
    unknown_one: Yup
        .string()
        .required('Required'),
    cast: Yup
        .string()
        .required('Required'),
    unknown_two: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function AddUrineRE({ patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        fungal_element     : '',
        epitheleal_cells_per_hpf: '',
        pus_cells_per_hps: '',
        rbcs_per_hpf: '',
        appearance: '',
        colour: '',
        ph: '',
        specific_gravity: '',
        protein: '',
        leucocytes: '',
        glucose: '',
        urobilinogen: '',
        blood: '',
        ketones: '',
        bilirubin: '',
        nitrites: '',
        bile_pigment: '',
        bile_salt: '',
        urobilin: '',
        yeast_like_cells: '',
        s_haematobium: '',
        bacteria: '',
        spermatozoa: '',
        crystals: '',
        unknown_one: '',
        cast: '',
        unknown_two: '',
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

    const handleClose  = () => { setOpen(false); closeModal('urinere'); };
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

        Axios.post(getBaseURL()+'add_urine_re', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('urinere'); }, 1050);
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
                                urine r/e
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
                                            <th width="15%" className="text-left">Macroscopy</th>
                                            <td width="20%" className="text-left">Appearance</td>
                                            <td width="22%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="appearance"
                                                    name="appearance">
                                                    {getAppearances().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="20%" className="text-left pl-20">Colour</td>
                                            <td width="23%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="colour"
                                                    name="colour">
                                                    {getColoursTwo().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left">Chemistry</th>
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
                                                    {getPhs().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Specific Gravity</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="specific_gravity"
                                                    name="specific_gravity">
                                                    {getSpecificGravityOptions().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Protein</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="protein"
                                                    name="protein">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Leucocytes</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="leucocytes"
                                                    name="leucocytes">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Glucose</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="glucose"
                                                    name="glucose">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Urobilinogen</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="urobilinogen"
                                                    name="urobilinogen">
                                                    {getUrobilinogens().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Blood</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="blood"
                                                    name="blood">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Ketones</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ketones"
                                                    name="ketones">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Bilirubin</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bilirubin"
                                                    name="bilirubin">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Nitrites</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="nitrites"
                                                    name="nitrites">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Bile Pigment</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bile_pigment"
                                                    name="bile_pigment">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20">Bile Salt</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bile_salt"
                                                    name="bile_salt">
                                                    {getBileSalt().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Urobilin</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="urobilin"
                                                    name="urobilin">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td className="text-left pl-20"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="text-left">Microscopy</th>
                                            <td className="text-left">Pus Cells Per HPF</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="pus_cells_per_hps"
                                                    name="pus_cells_per_hps"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td className="text-left pl-20">Yeast Like Cells</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="yeast_like_cells"
                                                    name="yeast_like_cells">
                                                    {getTVaginalis().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Epithelial Cells Per HPF</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="epitheleal_cells_per_hpf"
                                                    name="epitheleal_cells_per_hpf"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td className="text-left pl-20">S Haematobium</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="s_haematobium"
                                                    name="s_haematobium">
                                                    {getTVaginalis().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">RBC Per HPF</td>
                                            <td>
                                                <FormikTextField
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="rbcs_per_hpf"
                                                    name="rbcs_per_hpf"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td className="text-left pl-20">Bacteria</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="bacteria"
                                                    name="bacteria">
                                                    {getBacterias().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Spermatozoa</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="spermatozoa"
                                                    name="spermatozoa">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Crystals</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="crystals"
                                                    name="crystals">
                                                    {getCrystals().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="unknown_one"
                                                    name="unknown_one">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left">Cast</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="cast"
                                                    name="cast">
                                                    {getCasts().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th className="text-left"></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="unknown_two"
                                                    name="unknown_two">
                                                    {getProtein().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th></th>
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

export default AddUrineRE;

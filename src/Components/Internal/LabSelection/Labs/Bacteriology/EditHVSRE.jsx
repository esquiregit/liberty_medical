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
import { getTodaysDate, getTVaginalis } from '../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    pus_cells_per_hps: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    red_blood_cells: Yup
        .string()
        .required('Required'),
    epitheleal_cells_per_hpf: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    t_vaginalis: Yup
        .string()
        .required('Required'),
    yeast_like_cells: Yup
        .string()
        .required('Required'),
    gnid: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditHVSRE({ lab, patient, closeModal }) {
    const staff          = useSelector(state => state.authReducer.staff);
    const classes        = styles();
    const redBloodCells  = getTVaginalis();
    const yeastLikeCells = getTVaginalis();
    const tVaginalis     = getTVaginalis();
    const gnidOptions    = getTVaginalis();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        pus_cells_per_hps : lab.pus_cells_per_hps,
        red_blood_cells : lab.red_blood_cells,
        epitheleal_cells_per_hpf : lab.epitheleal_cells_per_hpf,
        t_vaginalis : lab.t_vaginalis,
        yeast_like_cells : lab.yeast_like_cells,
        gnid : lab.gnid,
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

    const handleClose  = () => { setOpen(false); closeModal('HVSRE'); };
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

        Axios.post(getBaseURL()+'edit_hvs_re', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('HVSRE'); }, 1050);
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
                            HVS r/e
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
                                            <th className="text-right pr-20">Microscopy</th>
                                            <td className="text-left">Pus Cells Per HPS</td>
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
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
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
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td className="text-left">Red Blood Cells</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="red_blood_cells"
                                                    name="red_blood_cells">
                                                    {redBloodCells.map((option, index) => (
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
                                            <td className="text-left">Yeast Like Cells</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="yeast_like_cells"
                                                    name="yeast_like_cells">
                                                    {yeastLikeCells.map((option, index) => (
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
                                            <td className="text-left">Trichonomas Vaginalis</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="t_vaginalis"
                                                    name="t_vaginalis">
                                                    {tVaginalis.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="25%"></td>
                                            <td width="25%" className="text-left">GNID</td>
                                            <td width="25%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="gnid"
                                                    name="gnid">
                                                    {gnidOptions.map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="25%"></td>
                                        </tr>
                                        <tr>
                                            <td className="text-right pr-20">Comments</td>
                                            <td colSpan="5">
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

export default EditHVSRE;

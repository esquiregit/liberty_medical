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
import { getTodaysDate, get_stool_re_first_row_first_column_options, get_stool_re_second_row_first_column_options, getStoolReAllFourthColumns, get_vegetative_form_options, get_cyst_options, get_larvae_options } from '../../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    row_one_one: Yup
        .string()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    ova_one: Yup
        .string()
        .required('Required'),
    ova_two: Yup
        .string()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    row_three_one: Yup
        .string()
        .required('Required'),
    row_three_two: Yup
        .string()
        .required('Required'),
    row_four_one: Yup
        .string()
        .required('Required'),
    row_four_two: Yup
        .string()
        .required('Required'),
    larvae_one: Yup
        .string()
        .required('Required'),
    larvae_two: Yup
        .string()
        .required('Required'),
    cyst_one: Yup
        .string()
        .required('Required'),
    cyst_two: Yup
        .string()
        .required('Required'),
    row_seven_one: Yup
        .string()
        .required('Required'),
    row_seven_two: Yup
        .string()
        .required('Required'),
    row_eight_one: Yup
        .string()
        .required('Required'),
    row_eight_two: Yup
        .string()
        .required('Required'),
    vegetative_form_one: Yup
        .string()
        .required('Required'),
    vegetative_form_two: Yup
        .string()
        .required('Required'),
    row_ten_one: Yup
        .string()
        .required('Required'),
    row_ten_two: Yup
        .string()
        .required('Required'),
    row_eleven_one: Yup
        .string()
        .required('Required'),
    row_eleven_two: Yup
        .string()
        .required('Required'),
    red_blood_cells: Yup
        .string()
        .required('Required'),
    white_blood_cells: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditStoolRE({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.pfirst_name+' '+lab.pmiddle_name+' '+lab.plast_name,
        row_one_one : lab.row_one_one,
        ova_one : lab.ova_one,
        ova_two : lab.ova_two,
        row_three_one : lab.row_three_one,
        row_three_two : lab.row_three_two,
        row_four_one : lab.row_four_one,
        row_four_two : lab.row_four_two,
        larvae_one : lab.larvae_one,
        larvae_two : lab.larvae_two,
        cyst_one : lab.cyst_one,
        cyst_two : lab.cyst_two,
        row_seven_one : lab.row_seven_one,
        row_seven_two : lab.row_seven_two,
        row_eight_one : lab.row_eight_one,
        row_eight_two : lab.row_eight_two,
        vegetative_form_one : lab.vegetative_form_one,
        vegetative_form_two : lab.vegetative_form_two,
        row_ten_one : lab.row_ten_one,
        row_ten_two : lab.row_ten_two,
        row_eleven_one : lab.row_eleven_one,
        row_eleven_two : lab.row_eleven_two,
        red_blood_cells : lab.red_blood_cells,
        white_blood_cells : lab.white_blood_cells,
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

    const handleClose  = () => { setOpen(false); closeModal('StoolRE'); };
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

        Axios.post(getBaseURL()+'edit_stool_re', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('StoolRE'); }, 1050);
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
                            stool r/e
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
                                            <th width="12%">Macroscopy</th>
                                            <td width="20%"></td>
                                            <td width="32%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_one_one"
                                                    name="row_one_one">
                                                    {get_stool_re_first_row_first_column_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="34%"></td>
                                        </tr>
                                        <tr>
                                            <th>Microscopy</th>
                                            <td className="text-left">Ova</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ova_one"
                                                    name="ova_one">
                                                    {get_stool_re_second_row_first_column_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ova_two"
                                                    name="ova_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_three_one"
                                                    name="row_three_one">
                                                    {get_stool_re_second_row_first_column_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_three_two"
                                                    name="row_three_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_four_one"
                                                    name="row_four_one">
                                                    {get_stool_re_second_row_first_column_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_four_two"
                                                    name="row_four_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left">Larvae</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="larvae_one"
                                                    name="larvae_one">
                                                    {get_larvae_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="larvae_two"
                                                    name="larvae_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left">Cyst</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="cyst_one"
                                                    name="cyst_one">
                                                    {get_cyst_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="cyst_two"
                                                    name="cyst_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_seven_one"
                                                    name="row_seven_one">
                                                    {get_cyst_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_seven_two"
                                                    name="row_seven_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_eight_one"
                                                    name="row_eight_one">
                                                    {get_cyst_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_eight_two"
                                                    name="row_eight_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left">Vegetative Form</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="vegetative_form_one"
                                                    name="vegetative_form_one">
                                                    {get_vegetative_form_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="vegetative_form_two"
                                                    name="vegetative_form_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_ten_one"
                                                    name="row_ten_one">
                                                    {get_vegetative_form_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_ten_two"
                                                    name="row_ten_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left"></td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_eleven_one"
                                                    name="row_eleven_one">
                                                    {get_vegetative_form_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="row_eleven_two"
                                                    name="row_eleven_two">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
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
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td className="text-left">White Blood Cells</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="white_blood_cells"
                                                    name="white_blood_cells">
                                                    {getStoolReAllFourthColumns().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td></td>
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

export default EditStoolRE;

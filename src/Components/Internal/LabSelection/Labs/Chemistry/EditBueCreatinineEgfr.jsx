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
import { getTodaysDate, getFlagOptions } from '../../../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../../../Extras/Dialogue';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    sodium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    sodium_flag: Yup
        .string()
        .required('Please Select Flag'),
    potassium: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    potassium_flag: Yup
        .string()
        .required('Please Select Flag'),
    chloride: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    chloride_flag: Yup
        .string()
        .required('Please Select Flag'),
    urea: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    urea_flag: Yup
        .string()
        .required('Please Select Flag'),
    creatinine: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    creatinine_flag: Yup
        .string()
        .required('Please Select Flag'),
    egfr: Yup
            .number()
            .min(0, 'Results Cannot Be Less Than 0')
            .required('Required'),
    comments: Yup
        .string()
});

function EditBueCreatinineEgfr({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const flagOptions = getFlagOptions();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.pfirst_name+' '+lab.pmiddle_name+' '+lab.plast_name,
        sodium : lab.sodium,
        sodium_flag : lab.sodium_flag,
        chloride : lab.chloride,
        chloride_flag : lab.chloride_flag,
        potassium : lab.potassium,
        potassium_flag : lab.potassium_flag,
        urea : lab.urea,
        urea_flag : lab.urea_flag,
        creatinine : lab.creatinine,
        creatinine_flag : lab.creatinine_flag,
        egfr : lab.egfr,
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

    const handleClose  = () => { setOpen(false); closeModal('buecreatinineegfr'); };
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

        Axios.post(getBaseURL()+'edit_bue_creatinine_egfr', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('buecreatinineegfr'); }, 1050);
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
                                Bue + Creatinine + eGFR
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
                                            <td width="19.34%">Sodium</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="sodium"
                                                    name="sodium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td width="11%">mmol/L</td>
                                            <td width="16.67%">
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="sodium_flag"
                                                    name="sodium_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td width="18.67%" colSpan="2">(135- 150)</td>
                                        </tr>
                                        <tr>
                                            <td>Potassium (Plasma/Urea)</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="potassium"
                                                    name="potassium"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="potassium_flag"
                                                    name="potassium_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(3.5 - 65.5)</td>
                                        </tr>
                                        <tr>
                                            <td>Chloride</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="chloride"
                                                    name="chloride"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="chloride_flag"
                                                    name="chloride_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(95 - 110)</td>
                                        </tr>
                                        <tr>
                                            <td>Urea</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="urea"
                                                    name="urea"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mmol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="urea_flag"
                                                    name="urea_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td colSpan="2">(2.1 - 7.1)</td>
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
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>umol/L</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="creatinine_flag"
                                                    name="creatinine_flag">
                                                    {flagOptions.map((flag, index) => (
                                                        <MenuItem key={index} value={flag.value}>
                                                            {flag.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                            <td>Male<br />(71 - 115)</td>
                                            <td>Female<br />(53 - 106)</td>
                                        </tr>
                                        <tr>
                                            <td colSpan="6">
                                                <strong>eGFR (MDRD)</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>eGFR (MDRD)</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="egfr"
                                                    name="egfr"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colSpan="6">
                                                <table id="detail-table">
                                                    <thead>
                                                        <tr>
                                                            <th className="text-centre" width="25%">eGFR (mL/min/1.73m)<sup>2</sup></th>
                                                            <th className="text-centre" width="50%">INTERPRETATION</th>
                                                            <th className="text-centre" width="25%">	STAGES OF KIDNEY FAILURE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td className="text-centre">&ge; 90</td>
                                                            <td>Normal</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">60-89</td>
                                                            <td>Mild Decrease</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">45-59</td>
                                                            <td>Mild To Moderate Decrease</td>
                                                            <td>3a</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">30-44</td>
                                                            <td>Moderate To Severe Decrease	</td>
                                                            <td>3b</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">15-29</td>
                                                            <td>Severe Decrease</td>
                                                            <td>4</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">&lt; 15</td>
                                                            <td>Kidney Failure</td>
                                                            <td>5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Comments</td>
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

export default EditBueCreatinineEgfr;

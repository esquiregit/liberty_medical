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
import { getTodaysDate, get_rhesus_options } from '../../../../Extras/Functions';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    results: Yup
        .number()
        .min(0, 'Results Must Be Greater Than 0')
        .required('Required'),
    ranges: Yup
        .string()
        .required('Required'),
    comments: Yup
        .string()
});

function EditSerumHCG({ lab, patient, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : patient.patient_id,
        patient    : patient.name,
        results : lab.results,
        ranges : lab.ranges,
        comments : lab.comments,
        entered_by : staff.staff_id,
    };

    const [open, setOpen]         = useState(true);
    const [error, setError]       = useState(false);
    const [values, setValues]     = useState([]);
    const [success, setSuccess]   = useState(false);
    const [message, setMessage]   = useState('');
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const handleClose  = () => { setOpen(false); closeModal('SerumHCG'); };
    const closeConfirm = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onConfirm    = values => { setValues(values); setShowDialogue(true); };
    const onSubmit     = () => {
        setBackdrop(true);
        setError(false);
        setSuccess(false);
        setComError(false);
        const abortController = new AbortController();
        const signal          = abortController.signal;

        Axios.post(getBaseURL()+'edit_serum_hcg_b', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('SerumHCG'); }, 1050);
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
            { error        && <Toastrr message={message} type="error"   /> }
            { success      && <Toastrr message={message} type="success" /> }
            { comError     && <Toastrr message={message} type="info"    /> }
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
                            <DialogTitle className="dialogue dialogue-title" id="customized-dialog-title" onClose={handleClose}>
                                B-HCG Serum
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
                                            <th>Test Required</th>
                                            <th>Results</th>
                                            <th>Unit</th>
                                            <th>Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>B-HCG Serum</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="results"
                                                    name="results"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>mIU/mL</td>
                                            <td>
                                                <FormikTextField
                                                    select
                                                    size="small"
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    id="ranges"
                                                    name="ranges">
                                                    {get_rhesus_options().map((option, index) => (
                                                        <MenuItem key={index} value={option.value}>
                                                            {option.label}
                                                        </MenuItem>
                                                    ))}
                                                </FormikTextField>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="text-centre pb-20" colSpan="5">
                                                Normal Non-Pregnant Individual is &lt; 6.15
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="5">
                                            <table id="detail-table">
                                                    <thead>
                                                        <tr>
                                                            <th colSpan="4" className="text-centre">PREGNANT WOMEN</th>
                                                        </tr>
                                                        <tr>
                                                            <th className="text-centre" width="25%">Trimester</th>
                                                            <th className="text-centre" width="25%">Gestation</th>
                                                            <th className="text-centre" width="25%">Mean (mIU/ml)</th>
                                                            <th className="text-centre" width="25%">Limits (mIU/ml)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>4</td>
                                                            <td>50,584</td>
                                                            <td>4,700 - 132,800</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>5</td>
                                                            <td>51,517</td>
                                                            <td>3,600 - 134,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>6</td>
                                                            <td>72,671</td>
                                                            <td>22,600 - 135,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>7</td>
                                                            <td>87,943</td>
                                                            <td>44,800 - 148,600</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>8</td>
                                                            <td>103,486</td>
                                                            <td>52,600 - 191,800</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>9</td>
                                                            <td>103,783</td>
                                                            <td>57,400 - 196,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>10</td>
                                                            <td>88,250</td>
                                                            <td>51,000 - 189,400</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>11</td>
                                                            <td>92,463</td>
                                                            <td>6,480 - 192,400</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">1<sup>st</sup></td>
                                                            <td>12</td>
                                                            <td>68,216</td>
                                                            <td>6740 - 129,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">2<sup>nd</sup> Trimester</td>
                                                            <td>13 - 27</td>
                                                            <td>23,700</td>
                                                            <td>8,200 - 147,200</td>
                                                        </tr>
                                                        <tr>
                                                            <td className="text-centre">3<sup>rd</sup> Trimester</td>
                                                            <td className="text-centre">28 - 40</td>
                                                            <td className="text-centre">17,000</td>
                                                            <td className="text-centre">2,320 - 81,800</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
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

export default EditSerumHCG;

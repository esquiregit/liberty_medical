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
    lh: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    fsh: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    prolactive: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    progesterone: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    oestrogen: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    testosterone: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Required'),
    comments: Yup
        .string()
});

function EditReproductiveAssay({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient : lab.name,
        lh : lab.lh,
        fsh : lab.fsh,
        prolactive : lab.prolactive,
        progesterone : lab.progesterone,
        oestrogen : lab.oestrogen,
        testosterone : lab.testosterone,
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

    const handleClose  = () => { setOpen(false); closeModal('reproductiveassay'); };
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

        Axios.post(getBaseURL()+'edit_reproductive_assay', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('reproductiveassay'); }, 1050);
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
                                Reproductive Assay
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
                                            <th width="14.29%">Hormone</th>
                                            <th width="14.29%">LH</th>
                                            <th width="14.29%">FSH</th>
                                            <th width="14.29%">Prolactive</th>
                                            <th width="14.29%">Progesterone</th>
                                            <th width="14.29%">Oestrogen</th>
                                            <th width="14.29%">Testosterone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Results</td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="lh"
                                                    name="lh"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="fsh"
                                                    name="fsh"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="prolactive"
                                                    name="prolactive"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="progesterone"
                                                    name="progesterone"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="oestrogen"
                                                    name="oestrogen"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                            <td>
                                                <FormikTextField
                                                    variant="outlined"
                                                    margin="normal"
                                                    fullWidth
                                                    size="small"
                                                    id="testosterone"
                                                    name="testosterone"
                                                    type="number"
                                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="detail-table" className="mt-40">
                                    <thead>
                                        <tr>
                                            <th className="text-left" width="14.29%">HORMONES</th>
                                            <th className="text-left" width="14.29%">LH (mIU/mL)</th>
                                            <th className="text-left" width="14.29%">FSH (mIU/mL)</th>
                                            <th className="text-left" width="14.29%">PROLACTIVE (ng/mL)</th>
                                            <th className="text-left" width="14.29%">PROGESTERONE (ng/mL)</th>
                                            <th className="text-left" width="14.29%">ESTRODIOL (pg/mL)</th>
                                            <th className="text-left" width="14.29%">TESTOSTERONE (ng/mL)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Follicular</td>
                                            <td>1.2 - 12.5</td>
                                            <td>3.2 - 15.0</td>
                                            <td>3.11 - 23.11</td>
                                            <td>0.4 - 2.3</td>
                                            <td>15 - 112.0</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Mid Cycle</td>
                                            <td>12 - 82</td>
                                            <td>7.5 - 20</td>
                                            <td>3.11 - 23.11</td>
                                            <td></td>
                                            <td>136 - 251</td>
                                            <td>Adult Males<br />2.2 - 10.5 g</td>
                                        </tr>
                                        <tr>
                                            <td>Luteal</td>
                                            <td>0.4 - 19</td>
                                            <td>1.3 - 11.0</td>
                                            <td>3.11 - 23.11</td>
                                            <td>1.2 - 18.8</td>
                                            <td>48 - 172</td>
                                            <td>Adult Females<br />0.2 - 1.2</td>
                                        </tr>
                                        <tr>
                                            <td>Post Menopausal</td>
                                            <td>14 - 48</td>
                                            <td>36 - 138</td>
                                            <td>2.92 - 19.33</td>
                                            <td>&lt; 1.4</td>
                                            <td>10 - 66.0</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Mem</td>
                                            <td>0.7 - 7.4</td>
                                            <td>1.5 - 11.8</td>
                                            <td>1.8 - 17.0</td>
                                            <td>&lt; 2.75</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Contraceptives</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>15 - 95</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="lab-table">
                                    <tbody>
                                        <tr>
                                            <td width="14%">Comments</td>
                                            <td>
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

export default EditReproductiveAssay;

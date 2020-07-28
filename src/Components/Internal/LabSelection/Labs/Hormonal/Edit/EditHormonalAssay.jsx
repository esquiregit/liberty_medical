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
    results: Yup
        .number()
        .min(0, 'Results Cannot Be Less Than 0')
        .required('Please Fill In Result')
});

function EditHormonalAssay({ lab, closeModal }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();

    const initialValues = {
        patient_id : lab.patient_id,
        patient    : lab.name,
        results : lab.results,
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

    const handleClose  = () => { setOpen(false); closeModal('hormonalassay'); };
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

        Axios.post(getBaseURL()+'edit_hormonal_assay', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => { closeModal('hormonalassay'); }, 1050);
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
                                Hormonal Assay
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
                                            <th>Test Required</th>
                                            <th>Results</th>
                                            <th>Unit</th>
                                            <th>Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>AMH, Mullerian Inhibiting<br />Substance (Serum, CLIA)</td>
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
                                            <td>ng/mL</td>
                                            <td className="text-centre">0.9 - 9.5</td>
                                        </tr>
                                        <tr>
                                            <td colSpan="4">
                                                <br />AMH is a dimeric glycoprotein hormone belonging to the TGF-B family, produced by sertoli cells of testis in males and by ovarian follicular granulose cells upto antral stage in female.<br /><br /><strong>IN MALES:</strong> It is used to evaluate testicular presence and function in infants with intersex conditions or ambiguous, and to distinguish between crytochidism and anorchia in males<br /><br /><strong>IN FEMALES:</strong> During reproductive age, follicular AMH production begins during the primary stage, peaks in preantral stage and has influence onfollicular sensitivity to FSH which is important in selection for follicular dominance. AMH levels thus represent the pool or number of primordial follicles but bot the quality of cocytes. AMH does not vary significant during menstrual cycle and hence can be measured independently of day of cycle<br /><br />&bull; Polycystic ovarian syndrome can elevate AMH 2 to 5 fold or higher than age-specific reference ranges & predict an ovulatory, irregular cycles, ovarian tumours like Granulosa cell tumour are often associated with higher AMH<br />&bull; Obese women are often associated with diminished ovarian reserve and can have 65% lower mean AMH levels than non obese women<br />&bull; A combination of age, ultrasound markers-ovarian volume and antral follicle count, AMH level and FSH level are
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table id="detail-table" className="mt-40">
                                    <thead>
                                        <tr>
                                            <th className="text-left" width="20%">AMH levels (ng/mL)</th>
                                            <th className="text-left" width="20%">Suggested patient categorization for fertility based on AMH for age group (20 to 45 years)</th>
                                            <th className="text-left" width="20%">Anticipated antral follicle count</th>
                                            <th className="text-left" width="20%">Anticipated FSH levels (day 3)</th>
                                            <th className="text-left" width="20%">Anticipated response to IVF/COH cycle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Below 0.3</td>
                                            <td>Very low</td>
                                            <td>Below 4</td>
                                            <td>Above 20</td>
                                            <td>Negligible/Poor</td>
                                        </tr>
                                        <tr>
                                            <td>0.3 to 2.19</td>
                                            <td>Low</td>
                                            <td>4 - 10</td>
                                            <td>Usually 16 - 20</td>
                                            <td>Reduced</td>
                                        </tr>
                                        <tr>
                                            <td>2.19 to 4</td>
                                            <td>Satisfactory</td>
                                            <td>11 - 25</td>
                                            <td>Within reference range or between 11 and 15</td>
                                            <td>Safe/Normal</td>
                                        </tr>
                                        <tr>
                                            <td>Above 4</td>
                                            <td>Optimal</td>
                                            <td>Upto 30 and above</td>
                                            <td>Within reference range, often between 10 and 15 or above 15</td>
                                            <td>Possibly Excessive</td>
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

export default EditHormonalAssay;

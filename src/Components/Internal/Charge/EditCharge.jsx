import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import styles from '../../Extras/styles';
import Toastrr from '../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import ChargePDF from './ChargePDF';
import GetAppIcon from '@material-ui/icons/GetApp';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
import SaveOutlinedIcon from '@material-ui/icons/SaveOutlined';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../Extras/server';
import { BlobProvider } from "@react-pdf/renderer";
import { Form, Formik } from 'formik';
import { FormikTextField } from 'formik-material-fields';
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import * as Yup from 'yup';
import 'tippy.js/dist/tippy.css';

const validationSchema = Yup.object().shape({
    type: Yup
        .string()
        .required('Please Fill In Charge Name'),
    amount: Yup
        .number()
        .min(1, 'Charge Amount Must Be Greater Than 0')
        .required('Please Fill In Charge Amount')
        .test('non-numeric', 'Invalid Charge Amount Entered', value => !isNaN(parseFloat(value)) && isFinite(value)),
});

function EditCharge({ staff, length, charge, closeExpandable, permissions }) {
    const classes         = styles();
    const filename        = charge.type+".pdf";
    const editTooltip     = "Update "+charge.type;
    const downloadTooltip = "Download "+charge.type;

    const initialValues = {
        staff  : staff.staff_id,
        id     : charge.id,
        type   : charge.type,
        amount : charge.amount_raw
    }

    const [error, setError]       = useState(false);
    const [values, setValues]     = useState([]);
    const [message, setMessage]   = useState(false);
    const [warning, setWarning]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const onConfirm    = values => { setValues(values); setShowDialogue(true); };
    const closeConfirm = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onSubmit     = () => {
        setBackdrop(true);
        setError(false);
        setWarning(false);
        setComError(false);

        Axios.post(getBaseURL() + 'edit_charge', values)
            .then(response => {
                setBackdrop(false);
                if (response.data[0].status.toLowerCase() === 'success') {
                    closeExpandable(response.data[0].message);
                } else if (response.data[0].status.toLowerCase() === 'warning') {
                    setWarning(true);
                    setMessage(response.data[0].message);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                }
            })
            .catch(error => {
                setBackdrop(false);
                setComError(true);
                setMessage("Network Error. Server Unreachable....");
            });
    }

    return (
        <TableRow className="inner-row">
            <TableCell colSpan={length + 1}>
                { error    && <Toastrr message={message} type="error"   /> }
                { warning  && <Toastrr message={message} type="warning" /> }
                { comError && <Toastrr message={message} type="info"    /> }
                { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Update Charge?'} closeConfirm={closeConfirm} /> }
                <Backdrop className={classes.backdrop} open={backdrop}>
                    <CircularProgress color="inherit" /> <span className='ml-15'>Updating Charge. Please Wait....</span>
                </Backdrop>
                <Formik
                    initialValues={initialValues}
                    validationSchema={validationSchema}
                    onSubmit={onConfirm} >
                    {({isValid, dirty}) => (
                        <div >
                            <Form className="text-right">
                                <FormikTextField
                                    disabled={true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="type"
                                    label="Charge"
                                    placeholder="Charge"
                                    name="type" />
                                <FormikTextField
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="amount"
                                    label="Amount"
                                    placeholder="Amount"
                                    name="amount"
                                    type="number"
                                    InputProps={{ inputProps: { min: 0, step: 0.5 } }} />
                                <Grid className="table-detail-toolbar" container spacing={0}>
                                    <Grid className="text-left" item xs={6}>
                                        {
                                            permissions.includes("Can View Charges List") &&
                                            <BlobProvider
                                                document={<ChargePDF charge={charge} />}
                                                fileName={filename}
                                                style={{
                                                    textDecoration: "none",
                                                }}>
                                                    {({url}) => (
                                                        <a href={url} target="_blank" rel="noopener noreferrer" >
                                                            <Tippy content={downloadTooltip}>
                                                                <IconButton>
                                                                    <GetAppIcon className="colour-success" />
                                                                </IconButton>
                                                            </Tippy>
                                                        </a>
                                                    )}
                                            </BlobProvider>
                                        }
                                    </Grid>
                                    <Grid item xs={6}>
                                        {
                                            permissions.includes("Can Edit Charge") &&
                                            <Tippy content={editTooltip}>
                                                <IconButton disabled={!(isValid && dirty)} type="submit">
                                                    <SaveOutlinedIcon color="primary" />
                                                </IconButton>
                                            </Tippy>
                                        }
                                    </Grid>
                                </Grid>
                            </Form>
                        </div>
                    )}
                </Formik>
            </TableCell>
        </TableRow>
    )
}

export default EditCharge;

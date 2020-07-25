import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Radio from '@material-ui/core/Radio';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../Extras/styles';
import Toastrr from '../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import MenuItem from '@material-ui/core/MenuItem';
import FormLabel from '@material-ui/core/FormLabel';
import TextField from '@material-ui/core/TextField';
import RadioGroup from '@material-ui/core/RadioGroup';
import FormControl from '@material-ui/core/FormControl';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
import FormErrorMessage from '../../Extras/FormErrorMessage';
import CircularProgress from '@material-ui/core/CircularProgress';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../Extras/Dialogue';
import 'tippy.js/dist/tippy.css';

function PayRequest({ request, closePayModal, closeExpandable, source }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();
    let balance   = request.discounted_cost_raw && request.amount_paid_raw ?
                  parseFloat(request.discounted_cost_raw.replace(',', '')) - parseFloat(request.amount_paid_raw.replace(',', '')) : request.discounted_cost;
    

    const [values, setValues] = useState([
        {
            payment_type    : '',
            discount        : request.discount ? request.discount : 0,
            request_id      : request ? request.request_id : '',
            total_cost      : request.total_cost_raw ? request.total_cost_raw : request.total_cost,
            discounted_cost : request.discounted_cost_raw ? request.discounted_cost_raw : request.discounted_cost,
            amount_paid     : request.amount_paid_raw ? request.amount_paid_raw : 0.00,
            amount          : '',
            balance         : parseFloat(balance).toFixed(2),
            staff           : staff.staff_id,
            source
        }
    ]);
    
    const [open, setOpen]           = useState(true);
    const [error, setError]         = useState(false);
    const [message, setMessage]     = useState('');
    const [warning, setWarning]     = useState(false);
    const [backdrop, setBackdrop]   = useState(false);
    const [comError, setComError]   = useState(false);
    const [formValid, setFormValid] = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const [amountTouched, setAmountTouched]                     = useState(false);
    const [amountErrorMessage, setAmountErrorMessage]           = useState('');
    const [paymentTypeErrorMessage, setPaymentTypeErrorMessage] = useState('');

    const handleChange   = event => {
        const name       = event.target.name;
        const value      = event.target.value;
        let newArr       = [...values];
        newArr[0][name]  = name === 'amount' ? parseFloat(value) : value;
        
        if(name === 'discount') {
            let discount_cost = parseFloat(values[0].total_cost) - (value / 100) * parseFloat(values[0].total_cost);
            values[0].discounted_cost = discount_cost;
            values[0].balance = discount_cost;
        }
        if(name === 'amount') {
            setAmountTouched(true);
        }
        
        setValues(newArr);
        setFormValid(validateValues());
    };
    const validateValues = () => {
        const payment_type = values[0].payment_type;
        const amount       = parseFloat(values[0].amount);
        const balance      = parseFloat(values[0].balance);
        
        if(amount === '') {
            setAmountErrorMessage('Please Fill In Amount');
        } else if(amount === 0) {
            setAmountErrorMessage('Amount Must Be Greater Than 0');
        } else if(amount > balance) {
            setAmountErrorMessage('Amount Cannot Be Greater Than Balance (GHS '+balance+')');
        } else {
            setAmountErrorMessage('');

            if(payment_type === '') {
                setPaymentTypeErrorMessage('Please Select Payment Type');
            } else {
                setPaymentTypeErrorMessage('');
            }
        }

        if(payment_type && amount && amount <= balance) {
            return true;
        }
        
        return false;
    };
    const handleClose    = () => { setOpen(false); closePayModal(); };
    const closeConfirm   = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onConfirm      = event => {
        event.preventDefault();
        setShowDialogue(true);
    };
    const onSubmit       = () => {
        setBackdrop(true);
        setError(false);
        setWarning(false);
        setComError(false);
        const abortController = new AbortController();
        const signal          = abortController.signal;

        Axios.post(getBaseURL()+'pay_lab', values, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setOpen(false);
                    closeExpandable(response.data[0].message);
                } else if(response.data[0].status.toLowerCase() === 'warning') {
                    setMessage(response.data[0].message);
                    setWarning(true);
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
            { warning      && <Toastrr message={message} type="warning" /> }
            { comError     && <Toastrr message={message} type="info"    /> }
            { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Pay Lab Request?'} closeConfirm={closeConfirm} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Paying Request. Please Wait....</span>
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
                <form onSubmit={onConfirm}>
                    <DialogTitle id="customized-dialog-title" onClose={handleClose}>
                        Lab Test Payment For {request.first_name} {request.middle_name} {request.last_name}
                    </DialogTitle>
                    <DialogContent dividers>
                        <Grid container spacing={3}>
                            <Grid item xs={12}>
                                <FormControl component="fieldset">
                                    <FormLabel component="legend">Payment Type</FormLabel>
                                    <RadioGroup
                                        className={paymentTypeErrorMessage ? "error-input" : ""}
                                        onChange={handleChange}
                                        row
                                        aria-label="Payment Type"
                                        name="payment_type"
                                        id="payment_type">
                                        <FormControlLabel value="Cash" control={<Radio />} label="Cash" />
                                        <FormControlLabel value="Bank" control={<Radio />} label="Bank" />
                                        <FormControlLabel value="Mobile Money" control={<Radio />} label="Mobile Money" />
                                    </RadioGroup>
                                { paymentTypeErrorMessage && <FormErrorMessage message={paymentTypeErrorMessage} /> }
                                </FormControl>
                            </Grid>
                            <Grid item xs={12} sm={3}>
                                <TextField
                                    value={values[0].total_cost}
                                    disabled={true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="total_cost"
                                    label="Total Cost"
                                    name="total_cost" />
                            </Grid>
                            <Grid item xs={12} sm={3}>
                                <TextField
                                    value={values[0].discounted_cost}
                                    disabled={true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="discounted_cost"
                                    label="Discounted Cost"
                                    name="discounted_cost" />
                            </Grid>
                            <Grid item xs={12} sm={3}>
                                <TextField
                                    value={values[0].amount_paid}
                                    disabled={true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="amount_paid"
                                    label="Amount Paid"
                                    name="amount_paid" />
                            </Grid>
                            <Grid item xs={12} sm={3}>
                                <TextField
                                    value={values[0].balance}
                                    disabled={true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="balance"
                                    label="Balance"
                                    name="balance" />
                            </Grid>
                            <Grid item xs={12} sm={6}>
                                <TextField
                                    select
                                    onChange={handleChange}
                                    value={values[0].discount}
                                    disabled={source === 'old-request' && request.amount_paid_raw > 0 && true}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="discount"
                                    label="Discount (%)"
                                    name="discount">
                                    {['0', '10', '15', '20', '25', '30', '35', '40', '45', '50'].map(discount => (
                                        <MenuItem key={discount} value={discount}>
                                            {discount}
                                        </MenuItem>
                                    ))}
                                </TextField>
                            </Grid>
                            <Grid item xs={12} sm={6}>
                                <TextField
                                    onChange={handleChange}
                                    className={amountErrorMessage && amountTouched ? "error-input" : ""}
                                    value={values[0].amount}
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="amount"
                                    label="Amount"
                                    placeholder="Amount"
                                    name="amount"
                                    type="number"
                                    InputProps={{ inputProps: { min: 0, step: 0.5, max: balance } }} />
                                { amountErrorMessage && amountTouched && <FormErrorMessage message={amountErrorMessage} /> }
                            </Grid>
                        </Grid>
                    </DialogContent>
                    <DialogActions>
                        {/* <Tippy content="Reset Form">
                            <Button
                                type="reset"
                                color="secondary">
                                Reset
                            </Button>
                        </Tippy> */}
                        <Tippy content="Pay Lab Request">
                            <Button
                                type="submit"
                                disabled={!formValid}
                                color="primary">
                                Pay Lab Request
                            </Button>
                        </Tippy>
                    </DialogActions>
                </form>
            </Dialog>
        </>
    );
}

export default PayRequest;

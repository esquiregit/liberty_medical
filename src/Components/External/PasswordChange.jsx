import React, { useEffect, useState } from 'react';
import md5 from 'md5';
import Axios from 'axios';
import Button from '@material-ui/core/Button';
import Loader from '../Extras/Loadrr';
import Toastrr from '../Extras/Toastrr';
import styles from '../Extras/styles';
import Backdrop from '@material-ui/core/Backdrop';
import Typography from '@material-ui/core/Typography';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../Extras/server';
import { Form, Formik } from 'formik';
import { FormikTextField } from 'formik-material-fields';
import * as Yup from 'yup';

const initialValues  = {
    password         : '',
    confirm_password : '',
}
const validationSchema = Yup.object().shape({
    password: Yup
        .string()
        .required('Please Enter New Password')
        .min(8, 'Password Must Contain At Least 8 Characters'),
    confirm_password: Yup
        .string()
        .required('Please Re-enter New Password')
        .test('password-mismatch', 'Passwords Don\'t Match', function(value) {
            return this.parent.password === value;
        }),
});

const PasswordChange = ({ match, history }) => {
    const staff_id   = match.params.id;
    const code       = match.params.code;
    const classes    = styles();

    const [open, setOpen]         = useState(false);
    const [error, setError]       = useState(false);
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState(false);
    const [success, setSuccess]   = useState(false);
    const [comError, setComError] = useState(false);

    useEffect(() => {
        document.title        = 'Password Change | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;

        const data = {
            i : staff_id,
            c : code,
        };

        Axios.post(getBaseURL()+'verify_password_change', data, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setLoading(false);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                    setTimeout(() => history.push('/'), 3000);
                }
            })
            .catch(error => {
                setOpen(false);
                setComError(true);
                setMessage('Network Error. Server Unreachable....');
            });

        return () => abortController.abort();
    }, [code, history, staff_id]);

    const onSubmit = (values, { resetForm }) => {
        setOpen(true);
        const abortController = new AbortController();
        const signal          = abortController.signal;

        const data = {
            i  : staff_id,
            c  : code,
            p  : md5(values.password),
            cp : md5(values.confirm_password),
        };
        
        setError(false);
        setSuccess(false);
        setComError(false);

        Axios.post(getBaseURL()+'password_change', data, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    resetForm();
                    setTimeout(() => history.push('/'), 3000);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                }
                setOpen(false);
            })
            .catch(error => {
                setOpen(false);
                setComError(true);
                setMessage('Network Error. Server Unreachable....');
            });

        return () => abortController.abort();
    }

    return (
        <>
            { error    && <Toastrr message={message} type="warning" /> }
            { success  && <Toastrr message={message} type="success" /> }
            { comError && <Toastrr message={message} type="info"    /> }
            <Backdrop className={classes.backdrop} open={open}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Changing Password. Please Wait....</span>
            </Backdrop>
            {
                loading ? <Loader /> :
                <Formik
                    initialValues={initialValues}
                    validationSchema={validationSchema}
                    onSubmit={onSubmit}>
                    {() => (  
                        <div className='recovery-div'>
                            <Form className="recovery-form">
                                <Typography className="mb-30" component="h1" variant="h4">
                                    Password Change
                                </Typography>
                                <FormikTextField
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="password"
                                    label="New Password"
                                    placeholder="New Password"
                                    name="password"
                                    type="password" />
                                <FormikTextField
                                    variant="outlined"
                                    margin="normal"
                                    fullWidth
                                    id="confirm_password"
                                    label="Re-enter Password"
                                    placeholder="Re-enter Password"
                                    name="confirm_password"
                                    type="password" />
                                <Button
                                    size="large"
                                    type="submit"
                                    fullWidth
                                    variant="contained"
                                    color="primary"
                                    className='text-capitalise mt-20'
                                    disableElevation>
                                    Change Password
                                </Button>
                            </Form>
                        </div>
                    )}
                </Formik>
            }
        </>
    );
}

export default PasswordChange;

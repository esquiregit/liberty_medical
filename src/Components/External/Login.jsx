import React, { useEffect, useState } from 'react';
import md5 from 'md5';
import Axios from 'axios';
import Button from '@material-ui/core/Button';
import styles from '../Extras/styles';
import Toastrr from '../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import Typography from '@material-ui/core/Typography';
import CircularProgress from '@material-ui/core/CircularProgress';
import { Link } from 'react-router-dom';
import { logIn } from '../../Store/Actions/AuthActions';
// import { getBack } from '../Extras/GoBack';
import { getBaseURL } from '../Extras/server';
import { Form, Formik } from 'formik';
import { FormikTextField } from 'formik-material-fields';
import { useDispatch, useSelector } from 'react-redux';
import * as Yup from 'yup';

const initialValues = {
    username : 'esquire',
    password : 'qwertyui'
}
const validationSchema = Yup.object().shape({
    username: Yup
            .string()
            .required('Please Enter Your Username or Email Address')
            .test("Empty Strings Not Allowed", "Empty Strings Not Allowed", (value) => {
                return value.trim().length;
            }),
    password: Yup
            .string()
            .required('Please Enter Your Password')
            .min(8, 'Password Must Be At Least 8 Characters Long')
});

const Login = ({ history }) => {
    const classes    = styles();
    const dispatch   = useDispatch();
    const isLoggedIn = useSelector(state => state.authReducer.isLoggedIn);

    const [error, setError]       = useState(false);
    const [message, setMessage]   = useState('');
    const [success, setSuccess]   = useState(false);
    const [warning, setWarning]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    
    useEffect(() => {
        // if(!isLoggedIn) {
            document.title = 'Login | Liberty Medical Labs';
        // } else {
        //     getBack(history);
        // }
    }, [isLoggedIn, history]);

    const onSubmit = (values, { resetForm }) => {
        setError(false);
        setSuccess(false);
        setWarning(false);
        setBackdrop(true);
        setComError(false);

        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        Axios.post(getBaseURL()+'login', { htrfdes: values.username, fdswaq: md5(values.password) }, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    resetForm();
                    setSuccess(true);
                    setMessage(response.data[0].message);
                    dispatch(logIn(response.data[0].user, response.data[0].permissions));
                    setTimeout(() => history.push('/dashboard/'), 2000);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                }
                setBackdrop(false);
            })
            .catch(error => {
                setBackdrop(false);
                setComError(true);
                setMessage('Network Error. Server Unreachable....');
            });

        return () => abortController.abort();
    }

    return (
        <>
            { error    && <Toastrr message={message} type="error"   /> }
            { success  && <Toastrr message={message} type="success" /> }
            { warning  && <Toastrr message={message} type="warning" /> }
            { comError && <Toastrr message={message} type="info"    /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Logging In. Please Wait....</span>
            </Backdrop>

            <Formik
                initialValues={initialValues}
                validationSchema={validationSchema}
                onSubmit={onSubmit}>
                {() => (   
                    <div className='login-div'>
                        <Form className="login-form">
                            <Typography className="mb-30" component="h1" variant="h4">
                                Liberty Medical Labs
                            </Typography>
                            <FormikTextField
                                variant="outlined"
                                margin="normal"
                                fullWidth
                                id="username"
                                label="Username/Email Address"
                                placeholder="Username/Email Address"
                                name="username"
                                autoComplete="email address"
                            />
                            <FormikTextField
                                variant="outlined"
                                margin="normal"
                                fullWidth
                                id="password"
                                label="Password"
                                placeholder="Password"
                                name="password"
                                type="password"
                            />
                            <Button
                                size="large"
                                type="submit"
                                fullWidth
                                variant="contained"
                                color="primary"
                                className='text-capitalise mt-20'
                                disableElevation>
                                Log In
                            </Button>
                            <Link to="/password-recovery/" variant="body2" className="mt-20">
                                Forgot password?
                            </Link>
                        </Form>
                    </div>
                )}
            </Formik>
        </>
    );
}

export default Login;

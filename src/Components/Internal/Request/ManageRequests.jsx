import React, { useState } from 'react';
import Fab from '@material-ui/core/Fab';
import clsx from 'clsx';
import Axios from 'axios';
import Footer from '../Layout/Footer';
import Header from '../Layout/Header';
import Loader from '../../Extras/Loadrr';
import styles from '../../Extras/styles';
import Toastrr from '../../Extras/Toastrr';
import Sidebar from '../Layout/Sidebar/Sidebar';
import Backdrop from '@material-ui/core/Backdrop';
import AddRequest from './AddRequest';
import Breadcrumb from '../Layout/Breadcrumb';
import ViewRequest from './ViewRequest';
import MUIDataTable from "mui-datatables";
import AddOutlinedIcon from '@material-ui/icons/AddOutlined';
import CircularProgress from '@material-ui/core/CircularProgress';
import PermScanWifiIcon from '@material-ui/icons/PermScanWifi';
import ReportOffOutlinedIcon from '@material-ui/icons/ReportOffOutlined';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';

function ManageRequests({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);

    const [error, setError]         = useState(false);
    const [loading, setLoading]     = useState(true);
    const [message, setMessage]     = useState('');
    const [success, setSuccess]     = useState(false);
    const [backdrop, setBackdrop]   = useState(false);
    const [comError, setComError]   = useState(false);
    const [requests, setRequests]   = useState([]);
    const [showModal, setShowModal] = useState(false);

    const closeModal      = () => {
        setSuccess(false);
        setShowModal(false);
    }
    const closeExpandable = message => {
        closeModal();
        setLoading(true);
        setMessage(message);
        setSuccess(true);
        setTimeout(() => { setLoading(false); }, 2000);
    };
    const completeRequest = (request) => {
        setBackdrop(true);
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && (permissions.includes("Can Create Lab") || permissions.includes("Can Edit Lab"))) {
                Axios.post(getBaseURL()+'complete_request', request, { signal: signal })
                    .then(response => {
                        if(response.data[0].status.toLowerCase() === 'success') {
                            setMessage(response.data[0].message);
                            setSuccess(true);
                        } else {
                            setError(true);
                            setMessage(response.data[0].message);
                        }
                        setBackdrop(false);
                    })
                    .catch(error => {
                        setMessage('Network Error. Server Unreachable....');
                        setBackdrop(false);
                        setComError(true);
                    });
            } else {
                history.push('/unauthorized-access/');
            }
        } else {
            history.push('/');
        }

        return () => abortController.abort();
    };

    React.useEffect(()    => {
        document.title        = 'Requests | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && permissions.includes("Can View Lab List")) {
                Axios.post(getBaseURL()+'get_requests', { role: staff.role_name, branch: staff.branch }, { signal: signal })
                    .then(response => {
                        setRequests(response.data);
                        setLoading(false);
                    })
                    .catch(error => {
                        setLoading(false);
                        setMessage('Network Error. Server Unreachable....');
                        setComError(true);
                    });
            } else {
                history.push('/unauthorized-access/');
            }
        } else {
            history.push('/');
        }

        return () => abortController.abort();
    }, [staff, permissions, history, loading, backdrop]);
    
    let rowsPerPage = [];
    const columns   = [
        {
            label: "Request ID",
            name: "request_id",
            options: {
                filter: true,
            }
        },
        {
            label: "Patient",
            name: "patient",
            options: {
                filter: true,
            }
        },
        {
            label: "Requests",
            name: "requests",
            options: {
                filter: true,
            }
        },
        {
            label: "Total Cost",
            name: "total_cost",
            options: {
                filter: true,
            }
        },
        {
            label: "Discounted Cost",
            name: "discounted_cost",
            options: {
                filter: true,
            }
        },
        {
            label: "Amount Paid",
            name: "amount_paid",
            options: {
                filter: true,
            }
        },
        {
            label: "Payment Methods",
            name: "payment_type",
            options: {
                filter: true,
            }
        },
        {
            label: "Branch",
            name: "branch",
            options: {
                filter: true,
            }
        }
    ];
    if (requests) {
        if (requests.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, requests.length];
        }
    } else {
        rowsPerPage = [10, 25, 50, 100];
    }
    const options = {
        filter: true,
        filterType: 'dropdown',
        responsive: 'vertical',
        pagination: true,
        rowsPerPageOptions: rowsPerPage,
        resizableColumns: false,
        expandableRows: permissions && (permissions.includes("Can View Lab List")
                        || permissions.includes("Can View Lab")
                        || permissions.includes("Can Edit Lab")
                        || permissions.includes("Can Pay Lab")) ? true : false,
        renderExpandableRow: (rowData, rowMeta) => <ViewRequest
                                                        staff={staff}
                                                        length={rowData.length}
                                                        request={requests[rowMeta.dataIndex]}
                                                        closeModal={closeModal}
                                                        closeExpandable={closeExpandable}
                                                        permissions={permissions}
                                                        completeRequest={completeRequest} />,
        downloadOptions: { filename: 'Requests.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching Requests Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search Requests",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter Requests",
            }
        }
    };
    
    return (
        <>
            { error     && <Toastrr message={message} type="error" /> }
            { success   && <Toastrr message={message} type="success" /> }
            { comError  && <Toastrr message={message} type="info"    /> }
            { showModal && <AddRequest closeModal={closeModal} closeExpandable={closeExpandable} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Completing Request. Please Wait....</span>
            </Backdrop>
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Requests" />
                {
                    loading ? <Loader /> :
                        (requests && requests.length)
                            ?
                            <div id="requests-table">
                                <MUIDataTable
                                    data={requests}
                                    columns={columns}
                                    options={options} />
                            </div>
                            :
                            comError
                            ?
                            //<div className="empty-data">
                                <div className="empty-data">
                                    <PermScanWifiIcon />
                                    <span>
                                        <strong>network error!</strong> &nbsp;server unreachable
                                    </span>
                                </div>
                                :
                                <div className="empty-data">
                                    <ReportOffOutlinedIcon />
                                    <span>
                                        <strong>No Requests Found{(staff.role_name.toLowerCase() !== 'administrator' && staff.role_name.toLowerCase() !== 'lab technician') && " For " + staff.branch}!</strong>
                                        &nbsp;
                                        { (staff.role_name.toLowerCase() === 'lab technician')
                                        ? <span>click the "add request" button below to add one</span>
                                        : null }
                                    </span>
                                </div>
                            //</div>
                }
                {
                    !comError && permissions && permissions.includes("Can Create Request") && <Fab
                        variant="extended"
                        size="medium"
                        aria-label="add"
                        className="dark-btn"
                        onClick={() => setShowModal(true)}>
                        <AddOutlinedIcon className="white" />
                        <span className="ml-10">Add Request</span>
                    </Fab>
                }
            </main>
            <Footer />
        </>
    );
}

export default ManageRequests;

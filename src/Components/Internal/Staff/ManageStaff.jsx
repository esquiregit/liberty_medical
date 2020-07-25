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
import EmptyData from '../../Extras/EmptyData';
import Breadcrumb from '../Layout/Breadcrumb';
import AddStaff from './AddStaff';
import ViewStaff from './ViewStaff';
import MUIDataTable from "mui-datatables";
import AddOutlinedIcon from '@material-ui/icons/AddOutlined';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';

function ManageStaff({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);

    const [stafff, setStafff]       = useState([]);
    const [error, setError]         = useState(false);
    const [loading, setLoading]     = useState(true);
    const [message, setMessage]     = useState('');
    const [success, setSuccess]     = useState(false);
    const [comError, setComError]   = useState(false);
    const [backdrop, setBackdrop]   = useState(false);
    const [showModal, setShowModal] = useState(false);
    const [backdropMessage, setBackdropMessage] = useState(false);

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
    const staffAction     = (staff_id, staff_name, action) => {
        setBackdrop(true);
        setError(false);
        setSuccess(false);
        setComError(false);
        setBackdropMessage(action+'ing '+staff_name+'....');
        const data = {
            staff_id,
            staff_name,
            action,
            staff: staff.staff_id
        };

        Axios.post(getBaseURL() + 'staff_action', data)
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setSuccess(true);
                    setMessage(response.data[0].message);
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
    };

    React.useEffect(()    => {
        document.title        = 'Staff | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && permissions.includes("Can View Staff List")) {
                Axios.post(getBaseURL()+'get_staff', { branch: staff.branch }, { signal: signal })
                    .then(response => {
                        setStafff(response.data);
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
            label: "Staff ID",
            name: "staff_id",
            options: {
                filter: true,
            }
        },
        {
            label: "Staff",
            name: "name",
            options: {
                filter: true,
            }
        },
        {
            label: "Username",
            name: "username",
            options: {
                filter: true,
            }
        },
        {
            label: "Gender",
            name: "gender",
            options: {
                filter: true,
            }
        },
        {
            label: "Email Address",
            name: "email_address",
            options: {
                filter: true,
            }
        },
        {
            label: "Role",
            name: "role",
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
        },
        {
            label: "Status",
            name: "status",
            options: {
                filter: true,
            }
        }
    ];
    if (stafff) {
        if (stafff.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, stafff.length];
        }
    } else {
        rowsPerPage = [10, 25, 50, 100];
    }
    const options = {
        filter: true,
        filterType: 'dropdown',
        responsive: 'standard',
        pagination: true,
        rowsPerPageOptions: rowsPerPage,
        resizableColumns: false,
        expandableRows: permissions && permissions.includes("Can View Staff") ? true : false,
        renderExpandableRow: (rowData, rowMeta) => <ViewStaff
                                                        length={rowData.length}
                                                        staff={stafff[rowMeta.dataIndex]}
                                                        closeExpandable={closeExpandable}
                                                        staffAction={staffAction}
                                                        permissions={permissions} />,
        downloadOptions: { filename: 'Staff.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching Staff Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search Staff",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter Staff",
            }
        }
    };
    
    return (
        <>
            { error     && <Toastrr message={message} type="error"   /> }
            { success   && <Toastrr message={message} type="success" /> }
            { comError  && <Toastrr message={message} type="info"    /> }
            { showModal && <AddStaff history={history} closeModal={closeModal} closeExpandable={closeExpandable} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>{backdropMessage}</span>
            </Backdrop>
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Staff" />
                {
                    loading ? <Loader /> :
                        (stafff && stafff.length)
                            ?
                            <MUIDataTable
                                data={stafff}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="Staff" plural="Staff" />
                }
                {
                    !comError && permissions && permissions.includes("Can Create Staff") && <Fab
                        variant="extended"
                        size="medium"
                        aria-label="add"
                        className="dark-btn"
                        onClick={() => setShowModal(true)}>
                        <AddOutlinedIcon className="white" />
                        <span className="ml-10">Add Staff</span>
                    </Fab>
                }
            </main>
            <Footer />
        </>
    );
}

export default ManageStaff;

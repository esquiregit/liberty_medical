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
import EmptyData from '../../Extras/EmptyData';
import AddPatient from './AddPatient';
import Breadcrumb from '../Layout/Breadcrumb';
import PayRequest from '../Request/PayRequest';
import ViewPatient from './ViewPatient';
import MUIDataTable from "mui-datatables";
import AddOutlinedIcon from '@material-ui/icons/AddOutlined';
import { getBaseURL } from '../../Extras/server';
import { storePatient } from '../../../Store/Actions/PatientActions';
import { useDispatch, useSelector } from 'react-redux';

function ManagePatients({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);
    const dispatch    = useDispatch();
    
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState('');
    const [request, setRequest]   = useState([]);
    const [success, setSuccess]   = useState(false);
    const [comError, setComError] = useState(false);
    const [patients, setPatients] = useState([]);
    
    const [showPayModal, setShowPayModal]               = useState(false);
    const [showAddPatientModal, setShowAddPatientModal] = useState(false);
    
    const closeAddPatientModal   = () => {
        setSuccess(false);
        setShowAddPatientModal(false);
    };
    const closePayModal          = () => { setShowPayModal(false); };
    const closeExpandable        = (message, action, patient, request) => {
        setLoading(true);
        setMessage(message);
        setSuccess(true);
        setTimeout(() => { setLoading(false); }, 2000);
        
        if(action && action.toLowerCase() === 'add patient') {
            closeAddPatientModal();
            dispatch(storePatient(patient));
        }
        if(request) {
            request && setRequest(request);
            setShowPayModal(true);
        }
    };    
    
    React.useEffect(()    => {
        document.title        = 'Patients | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && permissions.includes("Can View Patients List")) {
                Axios.post(getBaseURL()+'get_patients', { role: staff.role_name, branch: staff.branch }, { signal: signal })
                    .then(response => {
                        setPatients(response.data);
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
    }, [staff, permissions, history, loading]);
    
    let rowsPerPage = [];
    const columns   = [
        {
            label: "Patient ID",
            name: "patient_id",
            options: {
                filter: true,
            }
        },
        {
            label: "Patient",
            name: "name",
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
            label: "Mobile Number",
            name: "mobile_phone",
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
    if (patients) {
        if (patients.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, patients.length];
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
        expandableRows: permissions && permissions.includes("Can View Patient") ? true : false,
        renderExpandableRow: (rowData, rowMeta) => <ViewPatient
                                                        history={history}
                                                        length={rowData.length}
                                                        patient={patients[rowMeta.dataIndex]}
                                                        closeExpandable={closeExpandable}
                                                        permissions={permissions}
                                                        staff_id={staff.staff_id} />,
        downloadOptions: { filename: 'Patients.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching Patients Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search Patients",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter Patients",
            }
        }
    };
    
    return (
        <>
            { success             && <Toastrr message={message} type="success" /> }
            { comError            && <Toastrr message={message} type="info"    /> }
            { showAddPatientModal && <AddPatient closeAddPatientModal={closeAddPatientModal} closeExpandable={closeExpandable} /> }
            { showPayModal        && <PayRequest request={request} closePayModal={closePayModal} closeExpandable={closeExpandable} source="new-request" /> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Patients" />
                {
                    loading ? <Loader /> :
                        (patients && patients.length)
                            ?
                            <MUIDataTable
                                data={patients}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="Patient" plural="Patients" />
                }
                {
                    !comError && permissions && permissions.includes("Can Create Patient") && <Fab
                        variant="extended"
                        size="medium"
                        aria-label="add"
                        className="dark-btn"
                        onClick={() => setShowAddPatientModal(true)}>
                        <AddOutlinedIcon className="white" />
                        <span className="ml-10">Add Patient</span>
                    </Fab>
                }
            </main>
            <Footer />
        </>
    );
}

export default ManagePatients;

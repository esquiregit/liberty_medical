import React, { useState } from 'react';
import clsx from 'clsx';
import Axios from 'axios';
import Footer from '../../../Layout/Footer';
import Header from '../../../Layout/Header';
import Loader from '../../../../Extras/Loadrr';
import styles from '../../../../Extras/styles';
import Toastrr from '../../../../Extras/Toastrr';
import Sidebar from '../../../Layout/Sidebar/Sidebar';
import EmptyData from '../../../../Extras/EmptyData';
import Breadcrumb from '../../../Layout/Breadcrumb';
import ViewHistory from '../../../History/ViewHistory';
import MUIDataTable from "mui-datatables";
import { getBaseURL } from '../../../../Extras/server';
import { storePatient } from '../../../../../Store/Actions/PatientActions';
import { useDispatch, useSelector } from 'react-redux';

function ListAlphaFetoProtein({ history }) {
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
    const [labs, setlabs] = useState([]);
    
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
        document.title        = 'labs | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && (permissions.includes("Can View Lab List") || permissions.includes("Can Edit Lab"))) {
                Axios.post(getBaseURL()+'get_labs', { role: staff.role_name, branch: staff.branch }, { signal: signal })
                    .then(response => {
                        setlabs(response.data);
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
    if (labs) {
        if (labs.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, labs.length];
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
        expandableRows: permissions && (permissions.includes("Can View Lab List") || permissions.includes("Can Edit Lab")) ? true : false,
        renderExpandableRow: (rowData, rowMeta) => <ViewHistory
                                                        history={history}
                                                        length={rowData.length}
                                                        patient={labs[rowMeta.dataIndex]}
                                                        closeExpandable={closeExpandable}
                                                        permissions={permissions}
                                                        staff_id={staff.staff_id} />,
        downloadOptions: { filename: 'labs.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching labs Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search labs",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter labs",
            }
        }
    };
    
    return (
        <>
            { success  && <Toastrr message={message} type="success" /> }
            { comError && <Toastrr message={message} type="info"    /> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="History / Alpha Feto Protein" />
                {
                    loading ? <Loader /> :
                        (labs && labs.length)
                            ?
                            <MUIDataTable
                                data={labs}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="Alpha Feto Protein Lab" plural="Alpha Feto Protein Labs" />
                }
            </main>
            <Footer />
        </>
    );
}

export default ListAlphaFetoProtein;

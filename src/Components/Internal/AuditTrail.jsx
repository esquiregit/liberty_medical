import React, { useEffect, useState } from 'react';
import clsx from 'clsx';
import Axios from 'axios';
import styles from '../Extras/styles';
import Footer from './Layout/Footer';
import Header from './Layout/Header';
import Loader from '../Extras/Loadrr';
import Toastrr from '../Extras/Toastrr';
import Sidebar from './Layout/Sidebar/Sidebar';
import EmptyData from '../Extras/EmptyData';
import Breadcrumb from './Layout/Breadcrumb';
import MUIDataTable from "mui-datatables";
import { getBaseURL } from '../Extras/server';
import { useSelector } from 'react-redux';

function AuditTrail({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);

    const [logs, setLogs]         = useState(true);
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState('');
    const [comError, setComError] = useState(false);

    useEffect(() => {
        document.title        = 'Acitivity Log | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(staff.role_name.toLowerCase() === 'administrator') {
                Axios.post(getBaseURL()+'get_activity_logs', { signal: signal })
                    .then(response => {
                        setLogs(response.data);
                        setLoading(false);
                    })
                    .catch(error => {
                        setMessage('Network Error. Server Unreachable....');
                        setLoading(false);
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
            label: "Staff ID",
            name: "staff_id",
            options: {
                filter: true,
            }
        },
        {
            label: "Name",
            name: "name",
            options: {
                filter: true,
            }
        },
        {
            label: "Role",
            name: "role_name",
            options: {
                filter: true,
            }
        },
        {
            label: "Activity",
            name: "activity",
            options: {
                filter: true,
            }
        },
        {
            label: "Date",
            name: "date",
            options: {
                filter: true,
            }
        },
    ];
    if (logs) {
        if (logs.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, logs.length];
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
        downloadOptions: { filename: 'Activity Log.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching Activity Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search Activity Log",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter Activity Log",
            }
        }
    };
    
    return (
        <>
            { comError && <Toastrr message={message} type="info" /> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Activity Log" />
                {
                    loading ? <Loader /> :
                        (logs && logs.length)
                            ?
                            <MUIDataTable
                                data={logs}
                                columns={columns}
                                options={options} />
                            : <EmptyData error={comError} single="Activity Log" plural="Activity Logs" />
                }
            </main>
            <Footer />
        </>
    );
}

export default AuditTrail;

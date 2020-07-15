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
import Breadcrumb from '../Layout/Breadcrumb';
import AddCharge from './AddCharge';
import EditCharge from './EditCharge';
import MUIDataTable from "mui-datatables";
import AddOutlinedIcon from '@material-ui/icons/AddOutlined';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';

function ManageCharges({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);

    const [charges, setCharges]     = useState([]);
    const [loading, setLoading]     = useState(true);
    const [message, setMessage]     = useState('');
    const [success, setSuccess]     = useState(false);
    const [comError, setComError]   = useState(false);
    const [showModal, setShowModal] = useState(false);

    const closeExpandable = message => {
        setLoading(true);
        setMessage(message);
        setSuccess(true);
        setTimeout(() => { setLoading(false); }, 2000);
    };

    React.useEffect(()    => {
        document.title        = 'Charges | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && permissions.includes("Can View Charges List")) {
                Axios.post(getBaseURL()+'get_charges', { signal: signal })
                    .then(response => {
                        setCharges(response.data);
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
            label: "Charge",
            name: "type",
            options: {
                filter: true,
            }
        },
        {
            label: "Amount",
            name: "amount",
            options: {
                filter: true,
            }
        }
    ];
    if (charges) {
        if (charges.length < 100) {
            rowsPerPage = [10, 25, 50, 100];
        } else {
            rowsPerPage = [10, 25, 50, 100, charges.length];
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
        expandableRows: permissions && (permissions.includes('Can View Charges List') || permissions.includes('Can Edit Charge')) ? true : false,
        renderExpandableRow: (rowData, rowMeta) => <EditCharge
                                                        staff={staff}
                                                        length={rowData.length}
                                                        charge={charges[rowMeta.dataIndex]}
                                                        closeExpandable={closeExpandable}
                                                        permissions={permissions} />,
        downloadOptions: { filename: 'Charges.csv', separator: ', ' },
        page: 0,
        selectableRows: 'none',
        textLabels: {
            body: {
                noMatch: "No Matching Charges Found. Change Keywords and Try Again....",
                columnHeaderTooltip: column => `Sort By ${column.label}`
            },
            toolbar: {
                search: "Search Charges",
                viewColumns: "Show/Hide Columns",
                filterTable: "Filter Charges",
            }
        }
    };
    
    return (
        <>
            { success   && <Toastrr message={message} type="success" /> }
            { showModal && <AddCharge closeExpandable={closeExpandable} /> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Charges" />
                {
                    loading ? <Loader /> :
                        (charges && charges.length)
                            ?
                            <MUIDataTable
                                data={charges}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="Charge" plural="Charges" />
                }
                {
                    !comError && permissions && permissions.includes("Can Create Charge") && <Fab
                        variant="extended"
                        size="medium"
                        aria-label="add"
                        className="success"
                        onClick={() => setShowModal(true)}>
                        <AddOutlinedIcon className="white" />
                        <span className="ml-10">Add Charge</span>
                    </Fab>
                }
            </main>
            <Footer />
        </>
    );
}

export default ManageCharges;

import React, { useState } from 'react';
import clsx from 'clsx';
import Axios from 'axios';
import Footer from '../../../../Layout/Footer';
import Header from '../../../../Layout/Header';
import Loader from '../../../../../Extras/Loadrr';
import styles from '../../../../../Extras/styles';
import Toastrr from '../../../../../Extras/Toastrr';
import Sidebar from '../../../../Layout/Sidebar/Sidebar';
import EmptyData from '../../../../../Extras/EmptyData';
import Breadcrumb from '../../../../Layout/Breadcrumb';
import MUIDataTable from "mui-datatables";
import ViewFBC5P from '../View/ViewFBC5P';
import { getBaseURL } from '../../../../../Extras/server';
import { useSelector } from 'react-redux';

function ListFBC5P({ history }) {
    const staff       = useSelector(state => state.authReducer.staff);
    const classes     = styles();
    const visible     = useSelector(state => state.sidebarReducer.visible);
    const permissions = useSelector(state => state.authReducer.permissions);
    
    const [labs, setLabs]         = useState([]);
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState('');
    const [comError, setComError] = useState(false);
    
    const closeExpandable = () => {
        setLoading(true);
        setTimeout(() => { setLoading(false); }, 2000);
    };    
    React.useEffect(()    => {
        document.title        = 'FBC 5P | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && (permissions.includes("Can View Lab List") || permissions.includes("Can Edit Lab"))) {
                Axios.post(getBaseURL()+'get_fbc_5p', { role: staff.role_name, branch: staff.branch }, { signal: signal })
                    .then(response => {
                        setLabs(response.data);
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
            label: "Invoice",
            name: "invoice_id",
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
            label: "WBC",
            name: "wbc",
            options: {
                filter: true,
            }
        },
        {
            label: "NEU #",
            name: "neu_hash",
            options: {
                filter: true,
            }
        },
        {
            label: "LYM #",
            name: "lym_hash",
            options: {
                filter: true,
            }
        },
        {
            label: "MON #",
            name: "mon_hash",
            options: {
                filter: true,
            }
        },
        {
            label: "RBC",
            name: "rbc",
            options: {
                filter: true,
            }
        },
        {
            label: "HGB",
            name: "hgb",
            options: {
                filter: true,
            }
        },
        {
            label: "HCT",
            name: "hct",
            options: {
                filter: true,
            }
        },
        {
            label: "Performed By",
            name: "staff",
            options: {
                filter: true,
            }
        },
        {
            label: "Date",
            name: "date_added",
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
        renderExpandableRow: (rowData, rowMeta) => <ViewFBC5P
                                                        history={history}
                                                        length={rowData.length}
                                                        lab={labs[rowMeta.dataIndex]}
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
            { comError && <Toastrr message={message} type="info"    /> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="History / FBC 5P" />
                {
                    loading ? <Loader /> :
                        (labs && labs.length)
                            ?
                            <MUIDataTable
                                data={labs}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="FBC 5P Lab" plural="FBC 5P Labs" />
                }
            </main>
            <Footer />
        </>
    );
}

export default ListFBC5P;

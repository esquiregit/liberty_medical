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
import ViewEarSwabCS from '../View/ViewEarSwabCS';
import { getBaseURL } from '../../../../../Extras/server';
import { useSelector } from 'react-redux';

function ListEarSwabCS({ history }) {
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
        document.title        = 'Ear Swab CS | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        if(staff) {
            if(permissions && (permissions.includes("Can View Lab List") || permissions.includes("Can Edit Lab"))) {
                Axios.post(getBaseURL()+'get_ear_swab_cs', { role: staff.role_name, branch: staff.branch }, { signal: signal })
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
            label: "Culture",
            name: "culture",
            options: {
                filter: true,
            }
        },
        {
            label: "Bacteria",
            name: "bacteria_one",
            options: {
                filter: true,
            }
        },
        {
            label: "Bacteria",
            name: "bacteria_two",
            options: {
                filter: true,
            }
        },
        {
            label: "Bacteria",
            name: "bacteria_three",
            options: {
                filter: true,
            }
        },
        {
            label: "Comments",
            name: "comments",
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
        renderExpandableRow: (rowData, rowMeta) => <ViewEarSwabCS
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
                <Breadcrumb page="History / Ear Swab CS" />
                {
                    loading ? <Loader /> :
                        (labs && labs.length)
                            ?
                            <MUIDataTable
                                data={labs}
                                columns={columns}
                                options={options} />
                            :
                            <EmptyData error={comError} single="Ear Swab CS Lab" plural="Ear Swab CS Labs" />
                }
            </main>
            <Footer />
        </>
    );
}

export default ListEarSwabCS;

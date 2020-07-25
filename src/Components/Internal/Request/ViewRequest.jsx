import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Toastrr from '../../Extras/Toastrr';
import DoneIcon from '@material-ui/icons/Done';
import EuroIcon from '@material-ui/icons/Euro';
import GetAppIcon from '@material-ui/icons/GetApp';
import RequestPDF from './RequestPDF';
import PayRequest from './PayRequest';
import EditRequest from './EditRequest';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
import EditOutlinedIcon from '@material-ui/icons/EditOutlined';
import { getBaseURL } from '../../Extras/server';
import { BlobProvider } from "@react-pdf/renderer";
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import 'tippy.js/dist/tippy.css';

function ViewRequest({ staff, length, request, closeExpandable, permissions, completeRequest }) {
    const filename        = request.patient+".pdf";
    const payTooltip      = "Pay "+request.first_name+"'s Request";
    const editTooltip     = "Update "+request.first_name+"'s Request";
    const completeTooltip = "Complete "+request.first_name+"'s Request";
    const downloadTooltip = "Download "+request.first_name+"'s Request";
    
    const [message, setMessage]   = useState('');
    const [comError, setComError] = useState(false);
    const [requests, setRequests] = useState([]);
    const [showPayModal, setShowPayModal]   = useState(false);
    const [showEditModal, setShowEditModal] = useState(false);
    const [showConfirmation, setShowConfirmation] = useState(false);

    React.useEffect(()    => {
        document.title        = 'Requests | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        Axios.post(getBaseURL()+'fetch_receipt', { added_by: staff.staff_id, request_id: request.request_id }, { signal: signal })
            .then(response => {
                setRequests(response.data);
            })
            .catch(error => {
                setMessage('Network Error. Server Unreachable....');
                setComError(true);
            });

        return () => abortController.abort();
    }, [staff, permissions, request.request_id]);
    
    const closePayModal   = () => { setShowConfirmation(false); setShowPayModal(false); };
    const closeEditModal  = () => { setShowEditModal(false); };
    const confirmComplete = () => { setShowConfirmation(true); };
    const closeConfirm    = result => {
        setShowConfirmation(false);
        const requestt  = {
            id         : request.id,
            patient_id : request.patient_id,
            request_id : request.request_id,
            staff      : staff.staff_id
        };
        result && result.toLowerCase() === 'yes' && completeRequest(requestt);
    };
    
    return (
        <>
            <TableRow>
                <TableCell colSpan={length + 1}>
                    <div className="detail-div">
                        { comError          && !requests && <Toastrr message={message} type="info" /> }
                        { showConfirmation  && <ConfirmDialogue message={'Are You Sure You Want To Complete Request?'} closeConfirm={closeConfirm} /> }
                        { showPayModal      && <PayRequest  request={request} closePayModal={closePayModal} closeExpandable={closeExpandable} source="old-request" /> }
                        { showEditModal     && <EditRequest request={request} closeEditModal={closeEditModal} closeExpandable={closeExpandable} staff_id={staff.staff_id} /> }
                        <table id="detail-table">
                            <tbody>
                                <tr>
                                    <th width="20%">Request ID: </th>
                                    <td width="30%">{request.request_id}</td>
                                    <th width="20%">Patient ID: </th>
                                    <td width="30%">{request.patient_id}</td>
                                </tr>
                                <tr>
                                    <th>Patient: </th>
                                    <td>{request.patient}</td>
                                    <th>Requests: </th>
                                    <td>{request.requests}</td>
                                </tr>
                                <tr>
                                    <th>Total Cost: </th>
                                    <td>{request.total_cost}</td>
                                    <th>Discounted Cost: </th>
                                    <td>{request.discounted_cost}</td>
                                </tr>
                                <tr>
                                    <th>Amount Paid: </th>
                                    <td>{request.amount_paid}</td>
                                    <th>Payment Methods: </th>
                                    <td>{request.payment_type ? request.payment_type : 'None Yet'}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status: </th>
                                    <td>{request.payment_status}</td>
                                    <th>Status: </th>
                                    <td>{request.status}</td>
                                </tr>
                                <tr>
                                    <th>Date Added: </th>
                                    <td>{request.date_added}</td>
                                    <th>Added By: </th>
                                    <td>{request.staff}</td>
                                </tr>
                                <tr>
                                    <th>Branch: </th>
                                    <td colSpan="3">{request.branch}</td>
                                </tr>
                            </tbody>
                        </table>

                        <Grid className="table-detail-toolbar" container spacing={0}>
                            <Grid item xs={4}>
                                {
                                    !comError && permissions.includes("Can View Lab") && request.payment_status.toLowerCase() === 'paid' &&
                                    <BlobProvider
                                        document={<RequestPDF staff={staff} request={request} requests={requests} />}
                                        fileName={filename}
                                        style={{
                                            textDecoration: "none",
                                        }}>
                                            {({url}) => (
                                                <a href={url} target="_blank" rel="noopener noreferrer" >
                                                    <Tippy content={downloadTooltip}>
                                                        <IconButton>
                                                            <GetAppIcon className="colour-success" />
                                                        </IconButton>
                                                    </Tippy>
                                                </a>
                                            )}
                                    </BlobProvider>
                                }
                            </Grid>
                            <Grid item xs={8} className="text-right">
                                {
                                    permissions.includes("Can Edit Lab") &&
                                    request.payment_status.toLowerCase() !== 'paid'
                                    && (request.status.toLowerCase() === 'pending'
                                    || request.status.toLowerCase() !== 'completed') &&
                                    <Tippy content={editTooltip}>
                                        <IconButton onClick={() => setShowEditModal(true)}>
                                            <EditOutlinedIcon color="primary" />
                                        </IconButton>
                                    </Tippy>
                                }
                                {
                                    permissions.includes("Can Pay Lab") && 
                                    request.payment_status.toLowerCase() !== 'paid' &&
                                    <Tippy content={payTooltip}>
                                        <IconButton onClick={() => setShowPayModal(true)}>
                                            <EuroIcon className="color-success" />
                                        </IconButton>
                                    </Tippy>
                                }
                                {
                                    (request.status.toLowerCase() !== 'completed'
                                    && request.payment_status.toLowerCase() === 'paid') &&
                                    <Tippy content={completeTooltip}>
                                        <IconButton onClick={confirmComplete}>
                                            <DoneIcon className="dark" />
                                        </IconButton>
                                    </Tippy>
                                }
                            </Grid>
                        </Grid>
                    </div>
                </TableCell>
            </TableRow>
        </>
    )
}

export default ViewRequest;

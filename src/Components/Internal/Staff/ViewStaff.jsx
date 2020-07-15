import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import StaffPDF from './StaffPDF';
import BlockIcon from '@material-ui/icons/Block';
import EditStaff from './EditStaff';
import GetAppIcon from '@material-ui/icons/GetApp';
import ReplayIcon from '@material-ui/icons/Replay';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
// import EditOutlinedIcon from '@material-ui/icons/EditOutlined';
import { BlobProvider } from "@react-pdf/renderer";
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import 'tippy.js/dist/tippy.css';

function ViewStaff({ history, length, staff, closeExpandable, staffAction, permissions }) {
    const filename        = staff.name+".pdf";
    // const editTooltip  = "Update "+staff.first_name+"'s Details";
    const blockTooltip    = "Block " + staff.first_name;
    const unblockTooltip  = "Unblock " + staff.first_name;
    const downloadTooltip = "Download "+staff.first_name+"'s Details";

    const [action, setAction]             = useState(false);
    const [showModal, setShowModal]       = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const closeEditModal   = () => { setShowModal(false) };    
    const showConfirmation = action => {
        setAction(action);
        setShowDialogue(true);
    };
    const closeConfirm     = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && staffAction(staff.staff_id, staff.name, action);
    };

    return (
        <>
            <TableRow>
                <TableCell colSpan={length + 1}>
                    <div className="detail-div">
                        { showModal    && <EditStaff history={history} staff={staff} closeEditModal={closeEditModal} closeExpandable={closeExpandable} /> }
                        { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To '+action+' '+staff.name+'?'} closeConfirm={closeConfirm} /> }
                        <table id="detail-table">
                            <tbody>
                                <tr>
                                    <th width="20%">Staff ID: </th>
                                    <td width="30%">{staff.staff_id}</td>
                                    <th width="25%">Staff: </th>
                                    <td width="25%">{staff.name}</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td>{staff.gender}</td>
                                    <th>Email Address: </th>
                                    <td>{staff.email_address}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number: </th>
                                    <td>{staff.phone_number}</td>
                                    <th>Alternate Phone Number: </th>
                                    <td>{staff.phone_number_two}</td>
                                </tr>
                                <tr>
                                    <th>Role: </th>
                                    <td>{staff.role}</td>
                                    <th>Branch: </th>
                                    <td>{staff.branch}</td>
                                </tr>
                                <tr>
                                    <th>Username: </th>
                                    <td>{staff.username}</td>
                                    <th>Status: </th>
                                    <td>{staff.status}</td>
                                </tr>
                                <tr>
                                    <th>Date Created: </th>
                                    <td colSpan="3">{staff.created_at}</td>
                                </tr>
                            </tbody>
                        </table>

                        <Grid className="table-detail-toolbar" container spacing={0}>
                            <Grid item xs={4}>
                                <BlobProvider
                                    document={<StaffPDF staff={staff} />}
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
                            </Grid>
                            <Grid item xs={8} className="text-right">
                                {/* {
                                    permissions.includes("Can Edit Staff") &&
                                    <Tippy content={editTooltip}>
                                        <IconButton onClick={() => setShowModal(true)}>
                                            <EditOutlinedIcon color="primary" />
                                        </IconButton>
                                    </Tippy>
                                } */}
                                {
                                    permissions.includes("Can Block Staff") && staff.status.toLowerCase() === 'active' &&
                                    <Tippy content={blockTooltip}>
                                        <IconButton onClick={() => showConfirmation('Block')}>
                                            <BlockIcon color="secondary" />
                                        </IconButton>
                                    </Tippy>
                                }
                                {
                                    permissions.includes("Can Unblock Staff") && staff.status.toLowerCase() === 'inactive' &&
                                    <Tippy content={unblockTooltip}>
                                        <IconButton onClick={() => showConfirmation('Unblock')}>
                                            <ReplayIcon className="colour-success" />
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

export default ViewStaff;

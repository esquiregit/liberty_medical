import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import AddRequest from '../Request/AddRequest';
import GetAppIcon from '@material-ui/icons/GetApp';
import PatientPDF from './PatientPDF';
import EditPatient from './EditPatient';
import EditOutlinedIcon from '@material-ui/icons/EditOutlined';
import ListAltOutlinedIcon from '@material-ui/icons/ListAltOutlined';
import LocalHospitalOutlinedIcon from '@material-ui/icons/LocalHospitalOutlined';
import { BlobProvider } from "@react-pdf/renderer";
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import 'tippy.js/dist/tippy.css';

function ViewPatient({ history, length, patient, closeExpandable, permissions, staff_id }) {
    const filename        = patient.name+".pdf";
    const labTooltip      = "Perform Lab For "+patient.first_name;
    const editTooltip     = "Update "+patient.first_name+"'s Details";
    const requestTooltip  = "Add Request For "+patient.first_name;
    const downloadTooltip = "Download "+patient.first_name+"'s Details";

    const [showEditModal, setShowEditModal]             = useState(false);
    const [showAddRequestModal, setShowAddRequestModal] = useState(false);

    const closeEditModal       = () => { setShowEditModal(false) };
    const closeAddRequestModal = () => { setShowAddRequestModal(false) };
    const goToLab              = () => { history.push(`/lab-selection/${patient.patient_id}`); }

    return (
        <>
            <TableRow>
                <TableCell colSpan={length + 1}>
                    <div className="detail-div">
                        { showEditModal       && <EditPatient patient={patient} closeEditModal={closeEditModal} closeExpandable={closeExpandable} /> }
                        { showAddRequestModal && <AddRequest  patient={patient} closeAddRequestModal={closeAddRequestModal} closeExpandable={closeExpandable} staff_id={staff_id} /> }
                        <table id="detail-table">
                            <tbody>
                                <tr>
                                    <th width="20%">Patient ID: </th>
                                    <td width="30%">{patient.patient_id}</td>
                                    <th width="20%">Patient: </th>
                                    <td width="30%">{patient.title} {patient.name}</td>
                                </tr>
                                <tr>
                                    <th>Date Of Birth: </th>
                                    <td>{patient.date_of_birth}</td>
                                    <th>Gender: </th>
                                    <td>{patient.gender}</td>
                                </tr>
                                <tr>
                                    <th>Email Address: </th>
                                    <td>{patient.email_address}</td>
                                    <th>Mobile Phone: </th>
                                    <td>{patient.mobile_phone}</td>
                                </tr>
                                <tr>
                                    <th>Home Phone: </th>
                                    <td>{patient.home_phone} {!patient.home_phone && "No Home Phone"}</td>
                                    <th>Work Phone: </th>
                                    <td>{patient.work_phone} {!patient.work_phone && "No Work Phone"}</td>
                                </tr>
                                <tr>
                                    <th>Next Of Kin: </th>
                                    <td>{patient.next_of_kin_name}</td>
                                    <th>Next Of Kin Number: </th>
                                    <td>{patient.next_of_kin_number}</td>
                                </tr>
                                <tr>
                                    <th>Date Added: </th>
                                    <td>{patient.date_added}</td>
                                    <th>Added By: </th>
                                    <td>{patient.staff}</td>
                                </tr>
                                <tr>
                                    <th>Branch: </th>
                                    <td colSpan="3">{patient.branch}</td>
                                </tr>
                            </tbody>
                        </table>

                        <Grid className="table-detail-toolbar" container spacing={0}>
                            <Grid item xs={4}>
                                {
                                    permissions.includes("Can View Patient") &&
                                    <BlobProvider
                                        document={<PatientPDF patient={patient} />}
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
                                    permissions.includes("Can Edit Patient") &&
                                    <Tippy content={editTooltip}>
                                        <IconButton onClick={() => setShowEditModal(true)}>
                                            <EditOutlinedIcon color="primary" />
                                        </IconButton>
                                    </Tippy>
                                }
                                {
                                    permissions.includes("Can Create Lab") &&
                                    <>
                                        <Tippy content={labTooltip}>
                                            <IconButton onClick={goToLab}>
                                                <LocalHospitalOutlinedIcon className="colour-success" />
                                            </IconButton>
                                        </Tippy>
                                        <Tippy content={requestTooltip}>
                                            <IconButton onClick={() => setShowAddRequestModal(true)}>
                                                <ListAltOutlinedIcon className="dark" />
                                            </IconButton>
                                        </Tippy>
                                    </>
                                }
                            </Grid>
                        </Grid>
                    </div>
                </TableCell>
            </TableRow>
        </>
    )
}

export default ViewPatient;

import React from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import PatientPDF from './PatientPDF';
import GetAppIcon from '@material-ui/icons/GetApp';
import EditPatient from './EditPatient';
import EditOutlinedIcon from '@material-ui/icons/EditOutlined';
import { BlobProvider } from "@react-pdf/renderer";
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import 'tippy.js/dist/tippy.css';

function ViewPatient({ length, patient, closeExpandable, permissions }) {
    const filename        = patient.name+".pdf";
    const editTooltip     = "Update "+patient.first_name+"'s Details";
    const downloadTooltip = "Download "+patient.first_name+"'s Details";
    const [showModal, setShowModal] = React.useState(false);

    const closeEditModal = () => { setShowModal(false) };

    return (
        <>
            <TableRow>
                <TableCell colSpan={length + 1}>
                    <div className="detail-div">
                        { showModal && <EditPatient patient={patient} closeEditModal={closeEditModal} closeExpandable={closeExpandable} /> }
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
                                        <IconButton onClick={() => setShowModal(true)}>
                                            <EditOutlinedIcon color="primary" />
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

export default ViewPatient;

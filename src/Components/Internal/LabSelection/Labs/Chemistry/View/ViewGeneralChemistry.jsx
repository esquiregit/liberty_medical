import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFGeneralChemistry';
import EditLab from '../Edit/EditGeneralChemistry';
import EditOutlinedIcon from '@material-ui/icons/EditOutlined';
import { BlobProvider } from "@react-pdf/renderer";
import { TableRow, TableCell, IconButton } from '@material-ui/core';
import 'tippy.js/dist/tippy.css';

function ViewLab({ length, lab, closeExpandable, permissions }) {
    const filename        = lab.name+".pdf";
    const editTooltip     = "Update "+lab.first_name+"'s Lab Details";
    const downloadTooltip = "Download "+lab.first_name+"'s Lab Details";

    const [showModal, setShowEditModal] = useState(false);

    const closeModal = () => { setShowEditModal(false) };

    return (
        <>
            <TableRow>
                <TableCell colSpan={length + 1}>
                    <div className="detail-div">
                        { showModal && <EditLab lab={lab} closeModal={closeModal} closeExpandable={closeExpandable} /> }
                        <table id="detail-table">
                            <tbody>
                                <tr>
                                    <th width="20%">Invoice: </th>
                                    <td width="30%">{lab.invoice_id}</td>
                                    <th width="20%">Patient ID: </th>
                                    <td width="30%">{lab.patient_id}</td>
                                </tr>
                                <tr>
                                    <th>Patient: </th>
                                    <td>{lab.name}</td>
                                    <th>Gender: </th>
                                    <td>{lab.gender}</td>
                                </tr>
                                <tr>
                                    <th>Amylase: </th>
                                    <td>{lab.amylase}</td>
                                    <th>LDH: </th>
                                    <td>{lab.ldh}</td>
                                </tr>
                                <tr>
                                    <th>Creatine Kinase: </th>
                                    <td>{lab.creatine_kinase}</td>
                                    <th>Creatinine: </th>
                                    <td>{lab.creatinine}</td>
                                </tr>
                                <tr>
                                    <th>Uric Acid: </th>
                                    <td>{lab.uric_acid}</td>
                                    <th>Calcium: </th>
                                    <td>{lab.calcium}</td>
                                </tr>
                                <tr>
                                    <th>Phosphorus: </th>
                                    <td>{lab.phosphorus}</td>
                                    <th>Magnessium: </th>
                                    <td>{lab.magnessium}</td>
                                </tr>
                                <tr>
                                    <th>FBS Glucose: </th>
                                    <td>{lab.fbs_glucose}</td>
                                    <th>Globulin: </th>
                                    <td>{lab.globulin}</td>
                                </tr>
                                <tr>
                                    <th>Bili, Indirect: </th>
                                    <td>{lab.bili_indirect}</td>
                                    <th>% Glyco-HBG: </th>
                                    <td>{lab.glyco_hbg}</td>
                                </tr>
                                <tr>
                                    <th>Comments: </th>
                                    <td colSpan="3">{lab.comments}</td>
                                </tr>
                                <tr>
                                    <th>Date Added: </th>
                                    <td>{lab.date_added}</td>
                                    <th>Served By: </th>
                                    <td>{lab.staff}</td>
                                </tr>
                            </tbody>
                        </table>

                        <Grid className="table-detail-toolbar" container spacing={0}>
                            <Grid item xs={4}>
                                {
                                    permissions.includes("Can View Lab") &&
                                    <BlobProvider
                                        document={<PDFLab lab={lab} />}
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
                                    <Tippy content={editTooltip}>
                                        <IconButton onClick={() => setShowEditModal(true)}>
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

export default ViewLab;

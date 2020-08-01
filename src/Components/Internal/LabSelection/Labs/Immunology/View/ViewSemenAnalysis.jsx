import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFSemenAnalysis';
import EditLab from '../Edit/EditSemenAnalysis';
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
                                    <th>Volume: </th>
                                    <td>{lab.volume}</td>
                                    <th>Motility: </th>
                                    <td>{lab.motility}</td>
                                </tr>
                                <tr>
                                    <th colSpan="2"> </th>
                                    <td colSpan="2">{lab.unknown_one}</td>
                                </tr>
                                <tr>
                                    <th colSpan="2"> </th>
                                    <td colSpan="2">{lab.unknown_two}</td>
                                </tr>
                                <tr>
                                    <th>Consistency: </th>
                                    <td>{lab.consistency}</td>
                                    <th>Agglutination: </th>
                                    <td>{lab.agglutination}</td>
                                </tr>
                                <tr>
                                    <th>pH: </th>
                                    <td>{lab.ph}</td>
                                    <th>Colour: </th>
                                    <td>{lab.colour}</td>
                                </tr>
                                <tr>
                                    <th>Count: </th>
                                    <td>{lab.count}</td>
                                    <th>Viability: </th>
                                    <td>{lab.viability}</td>
                                </tr>
                                <tr>
                                    <th>Morphology: </th>
                                    <td>{lab.morphology}</td>
                                    <th>Testicular Cells: </th>
                                    <td>{lab.testicular_cells}</td>
                                </tr>
                                <tr>
                                    <th>Pus Cells: </th>
                                    <td>{lab.pus_cells}</td>
                                    <th>Epithelial: </th>
                                    <td>{lab.epithelial}</td>
                                </tr>
                                <tr>
                                    <th>Red Blood Cells: </th>
                                    <td>{lab.red_blood_cells}</td>
                                    <th>Comments: </th>
                                    <td>{lab.comments}</td>
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

import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFStoolRE';
import EditLab from '../Edit/EditStoolRE';
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
                                    <th width="25%">Invoice: </th>
                                    <td width="25%">{lab.invoice_id}</td>
                                    <th width="25%">Patient ID: </th>
                                    <td width="25%">{lab.patient_id}</td>
                                </tr>
                                <tr>
                                    <th>Patient: </th>
                                    <td>{lab.name}</td>
                                    <th>Gender: </th>
                                    <td>{lab.gender}</td>
                                </tr>
                                <tr>
                                    <th>Macroscopy</th>
                                    <th></th>
                                    <td>{lab.row_one_one}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Microscopy</th>
                                    <th>Ova: </th>
                                    <td>{lab.ova_one}</td>
                                    <td>{lab.ova_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_three_one}</td>
                                    <td>{lab.row_three_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_four_one}</td>
                                    <td>{lab.row_four_one}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Larvae: </th>
                                    <td>{lab.larvae_one}</td>
                                    <td>{lab.larvae_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Cyst: </th>
                                    <td>{lab.cyst_one}</td>
                                    <td>{lab.cyst_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_seven_one}</td>
                                    <td>{lab.row_seven_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_eight_one}</td>
                                    <td>{lab.row_eight_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Vegetative Form: </th>
                                    <td>{lab.vegetative_form_one}</td>
                                    <td>{lab.vegetative_form_one}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_ten_one}</td>
                                    <td>{lab.row_ten_one}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.row_eleven_one}</td>
                                    <td>{lab.row_eleven_one}</td>
                                </tr>
                                <tr>
                                    <th>Red Blood Cells: </th>
                                    <td>{lab.red_blood_cells}</td>
                                    <th>White Blood Cells: </th>
                                    <td>{lab.white_blood_cells}</td>
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

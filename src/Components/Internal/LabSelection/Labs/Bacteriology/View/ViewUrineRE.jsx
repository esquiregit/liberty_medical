import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFUrineRE';
import EditLab from '../Edit/EditUrineRE';
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
                            </tbody>
                        </table>

                        <table id="detail-table">
                            <tbody>
                                <tr>
                                    <th>Macroscopy</th>
                                    <th>Appearance</th>
                                    <td>{lab.appearance}</td>
                                    <th>Colour</th>
                                    <td>{lab.colour}</td>
                                </tr>
                                <tr>
                                    <th>Chemistry</th>
                                    <th>pH: </th>
                                    <td>{lab.ph}</td>
                                    <th>Specific Gravity: </th>
                                    <td>{lab.specific_gravity}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Protein: </th>
                                    <td>{lab.protein}</td>
                                    <th>Leucocytes: </th>
                                    <td>{lab.leucocytes}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Glucose: </th>
                                    <td>{lab.glucose}</td>
                                    <th>Urobilinogen: </th>
                                    <td>{lab.urobilinogen}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Blood: </th>
                                    <td>{lab.blood}</td>
                                    <th>Ketones: </th>
                                    <td>{lab.ketones}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Bilirubin: </th>
                                    <td>{lab.bilirubin}</td>
                                    <th>Nitrites: </th>
                                    <td>{lab.nitrites}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Bile Pigment: </th>
                                    <td>{lab.bile_pigment}</td>
                                    <th>Bile Salt: </th>
                                    <td>{lab.bile_salt}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Urobilin: </th>
                                    <td>{lab.robilin}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Pus Cells Per HPF: </th>
                                    <td>{lab.pus_cells_per_hps}</td>
                                    <th>Yeast-Like Cells: </th>
                                    <td>{lab.yeast_like_cells}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Epithelial Cells Per HPF: </th>
                                    <td>{lab.epitheleal_cells_per_hpf}</td>
                                    <th>S Haematobium: </th>
                                    <td>{lab.s_haematobium}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>RBC Per HPF: </th>
                                    <td>{lab.rbcs_per_hpf}</td>
                                    <th>Bacteria: </th>
                                    <td>{lab.bacteria}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Spermatozoa: </th>
                                    <td>{lab.spermatozoa}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Crystals: </th>
                                    <td>{lab.crystals}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.unknown_one}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Cast: </th>
                                    <td>{lab.cast}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <td>{lab.unknown_two}</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <tr>
                                    <th colSpan="2">Comments: </th>
                                    <td colSpan="4">{lab.comments}</td>
                                </tr>
                                <tr>
                                    <th>Date Added: </th>
                                    <td>{lab.date_added}</td>
                                    <th>Served By: </th>
                                    <td colSpan="2">{lab.staff}</td>
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

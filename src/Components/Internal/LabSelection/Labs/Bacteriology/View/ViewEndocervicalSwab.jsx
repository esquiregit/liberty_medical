import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFEndocervicalSwab';
import EditLab from '../Edit/EditEndocervicalSwab';
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
                                    <th>Invoice: </th>
                                    <td colSpan="2">{lab.invoice_id}</td>
                                    <th>Patient ID: </th>
                                    <td colSpan="2">{lab.patient_id}</td>
                                </tr>
                                <tr>
                                    <th>Patient: </th>
                                    <td colSpan="2">{lab.name}</td>
                                    <th>Gender: </th>
                                    <td colSpan="2">{lab.gender}</td>
                                </tr>
                                <tr>
                                    <th>Pus Cells Per HPS: </th>
                                    <td colSpan="2">{lab.pus_cells_per_hps}</td>
                                    <th>RBCs Per HPF: </th>
                                    <td colSpan="2">{lab.rbcs_per_hpf}</td>
                                </tr>
                                <tr>
                                    <th>Epithelial Cells Per HPF: </th>
                                    <td colSpan="2">{lab.epitheleal_cells_per_hpf}</td>
                                    <th>T Vaginalis: </th>
                                    <td colSpan="2">{lab.t_vaginalis}</td>
                                </tr>
                                <tr>
                                    <th>Yeast-Like Cells: </th>
                                    <td colSpan="2">{lab.yeast_like_cells}</td>
                                    <th>Gram Stain: </th>
                                    <td colSpan="2">{lab.gram_stain}</td>
                                </tr>
                                <tr>
                                    <th>Culture: </th>
                                    <td colSpan="5">{lab.culture}</td>
                                </tr>
                                <tr>
                                    <th width="16.67%">Bacteria: </th>
                                    <td width="16.67%">{lab.bacteria_one}</td>
                                    <th className="text-left" width="16.67%">Antibiotics</th>
                                    <th className="text-left" width="16.67%">Sensitivity</th>
                                    <th className="text-left" width="16.67%">Antibiotics</th>
                                    <th className="text-left" width="16.67%">Sensitivity</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_one}</td>
                                    <td>{lab.sensitivity_one}</td>
                                    <td>{lab.antibiotics_two}</td>
                                    <td>{lab.sensitivity_two}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_three}</td>
                                    <td>{lab.sensitivity_three}</td>
                                    <td>{lab.antibiotics_four}</td>
                                    <td>{lab.sensitivity_four}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_five}</td>
                                    <td>{lab.sensitivity_five}</td>
                                    <td>{lab.antibiotics_six}</td>
                                    <td>{lab.sensitivity_six}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_seven}</td>
                                    <td>{lab.sensitivity_seven}</td>
                                    <td>{lab.antibiotics_eight}</td>
                                    <td>{lab.sensitivity_eight}</td>
                                </tr>
                                <tr>
                                    <th>Bacteria: </th>
                                    <td>{lab.bacteria_two}</td>
                                    <th className="text-left">Antibiotics</th>
                                    <th className="text-left">Sensitivity</th>
                                    <th className="text-left">Antibiotics</th>
                                    <th className="text-left">Sensitivity</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_nine}</td>
                                    <td>{lab.sensitivity_nine}</td>
                                    <td>{lab.antibiotics_ten}</td>
                                    <td>{lab.sensitivity_ten}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_eleven}</td>
                                    <td>{lab.sensitivity_eleven}</td>
                                    <td>{lab.antibiotics_twelve}</td>
                                    <td>{lab.sensitivity_twelve}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_thirteen}</td>
                                    <td>{lab.sensitivity_thirteen}</td>
                                    <td>{lab.antibiotics_fourteen}</td>
                                    <td>{lab.sensitivity_fourteen}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td>{lab.antibiotics_fifteen}</td>
                                    <td>{lab.sensitivity_fifteen}</td>
                                    <td>{lab.antibiotics_sixteen}</td>
                                    <td>{lab.sensitivity_sixteen}</td>
                                </tr>
                                <tr>
                                    <th>Comments: </th>
                                    <td colSpan="5">{lab.comments}</td>
                                </tr>
                                <tr>
                                    <th>Date Added: </th>
                                    <td>{lab.date_added}</td>
                                    <th>Served By: </th>
                                    <td colSpan="3">{lab.staff}</td>
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

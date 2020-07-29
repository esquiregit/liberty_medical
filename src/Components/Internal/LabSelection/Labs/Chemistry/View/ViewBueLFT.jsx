import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFBueLFT';
import EditLab from '../Edit/EditBueLft';
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
                                    <th>Sodium: </th>
                                    <td>{lab.sodium}</td>
                                    <th>Flag: </th>
                                    <td>{lab.sodium_flag}</td>
                                </tr>
                                <tr>
                                    <th>Potassium (Plasma/Urea): </th>
                                    <td>{lab.potassium}</td>
                                    <th>Flag: </th>
                                    <td>{lab.potassium_flag}</td>
                                </tr>
                                <tr>
                                    <th>Chloride: </th>
                                    <td>{lab.chloride}</td>
                                    <th>Flag: </th>
                                    <td>{lab.chloride_flag}</td>
                                </tr>
                                <tr>
                                    <th>Urea: </th>
                                    <td>{lab.urea}</td>
                                    <th>Flag: </th>
                                    <td>{lab.urea_flag}</td>
                                </tr>
                                <tr>
                                    <th>Creatinine: </th>
                                    <td>{lab.creatinine}</td>
                                    <th>Flag: </th>
                                    <td>{lab.creatinine_flag}</td>
                                </tr>
                                <tr>
                                    <th>eGFR (MDRD): </th>
                                    <td colSpan="3">{lab.egfr}</td>
                                </tr>
                                <tr>
                                    <th>GOT (AST): </th>
                                    <td>{lab.got_ast}</td>
                                    <th>Flag: </th>
                                    <td>{lab.got_ast_flag}</td>
                                </tr>
                                <tr>
                                    <th>GPT (ALT): </th>
                                    <td>{lab.gpt_alt}</td>
                                    <th>Flag: </th>
                                    <td>{lab.gpt_alt_flag}</td>
                                </tr>
                                <tr>
                                    <th>Alkaline Phos: </th>
                                    <td>{lab.alkaline_phos}</td>
                                    <th>Flag: </th>
                                    <td>{lab.alkaline_phos_flag}</td>
                                </tr>
                                <tr>
                                    <th>GGT: </th>
                                    <td>{lab.ggt}</td>
                                    <th>Flag: </th>
                                    <td>{lab.ggt_flag}</td>
                                </tr>
                                <tr>
                                    <th>Bilirubin-Total: </th>
                                    <td>{lab.bilirubin_total}</td>
                                    <th>Flag: </th>
                                    <td>{lab.bilirubin_total_flag}</td>
                                </tr>
                                <tr>
                                    <th>Bili, Indirect: </th>
                                    <td>{lab.bili_indirect}</td>
                                    <th>Flag: </th>
                                    <td>{lab.bili_indirect_flag}</td>
                                </tr>
                                <tr>
                                    <th>Bilirubin-Direct: </th>
                                    <td>{lab.bilirubin_direct}</td>
                                    <th>Flag: </th>
                                    <td>{lab.bilirubin_direct_flag}</td>
                                </tr>
                                <tr>
                                    <th>Protein-Total: </th>
                                    <td>{lab.protein_total}</td>
                                    <th>Flag: </th>
                                    <td>{lab.protein_total_flag}</td>
                                </tr>
                                <tr>
                                    <th>Albumin: </th>
                                    <td>{lab.albumin}</td>
                                    <th>Flag: </th>
                                    <td>{lab.albumin_flag}</td>
                                </tr>
                                <tr>
                                    <th>Globulin: </th>
                                    <td>{lab.globulin}</td>
                                    <th>Flag: </th>
                                    <td>{lab.globulin_flag}</td>
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

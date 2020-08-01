import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Tippy from '@tippy.js/react';
import GetAppIcon from '@material-ui/icons/GetApp';
import PDFLab from '../PDF/PDFFBC3P';
import EditLab from '../Edit/EditFBC3P';
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
                                    <th>WBC: </th>
                                    <td>{lab.wbc}</td>
                                    <th>Flag: </th>
                                    <td>{lab.wbc_info}</td>
                                </tr>
                                <tr>
                                    <th>LYM %: </th>
                                    <td>{lab.lym}</td>
                                    <th>Flag: </th>
                                    <td>{lab.lym_info}</td>
                                </tr>
                                <tr>
                                    <th>MID %: </th>
                                    <td>{lab.mid}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mid_info}</td>
                                </tr>
                                <tr>
                                    <th>GRAN %: </th>
                                    <td>{lab.gran}</td>
                                    <th>Flag: </th>
                                    <td>{lab.gran_info}</td>
                                </tr>
                                <tr>
                                    <th>LYM #1: </th>
                                    <td>{lab.lym_one}</td>
                                    <th>Flag: </th>
                                    <td>{lab.lym_one_info}</td>
                                </tr>
                                <tr>
                                    <th>MID #2: </th>
                                    <td>{lab.mid_two}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mid_two_info}</td>
                                </tr>
                                <tr>
                                    <th>GRAN #3: </th>
                                    <td>{lab.gran_three}</td>
                                    <th>Flag: </th>
                                    <td>{lab.gran_three_info}</td>
                                </tr>
                                <tr>
                                    <th>RBC: </th>
                                    <td>{lab.rbc}</td>
                                    <th>Flag: </th>
                                    <td>{lab.rbc_info}</td>
                                </tr>
                                <tr>
                                    <th>HGB: </th>
                                    <td>{lab.hgb}</td>
                                    <th>Flag: </th>
                                    <td>{lab.hgb_info}</td>
                                </tr>
                                <tr>
                                    <th>HCT: </th>
                                    <td>{lab.hct}</td>
                                    <th>Flag: </th>
                                    <td>{lab.hct_info}</td>
                                </tr>
                                <tr>
                                    <th>MCV: </th>
                                    <td>{lab.mcv}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mcv_info}</td>
                                </tr>
                                <tr>
                                    <th>MCH: </th>
                                    <td>{lab.mch}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mch_info}</td>
                                </tr>
                                <tr>
                                    <th>MCHC: </th>
                                    <td>{lab.mchc}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mchc_info}</td>
                                </tr>
                                <tr>
                                    <th>RDW_CV: </th>
                                    <td>{lab.rdw_cv}</td>
                                    <th>Flag: </th>
                                    <td>{lab.rdw_cv_info}</td>
                                </tr>
                                <tr>
                                    <th>RDW_SD: </th>
                                    <td>{lab.rdw_sd}</td>
                                    <th>Flag: </th>
                                    <td>{lab.rdw_sd_info}</td>
                                </tr>
                                <tr>
                                    <th>PLT: </th>
                                    <td>{lab.plt}</td>
                                    <th>Flag: </th>
                                    <td>{lab.plt_info}</td>
                                </tr>
                                <tr>
                                    <th>MPV: </th>
                                    <td>{lab.mpv}</td>
                                    <th>Flag: </th>
                                    <td>{lab.mpv_info}</td>
                                </tr>
                                <tr>
                                    <th>PDW: </th>
                                    <td>{lab.pdw}</td>
                                    <th>Flag: </th>
                                    <td>{lab.pdw_info}</td>
                                </tr>
                                <tr>
                                    <th>PCT: </th>
                                    <td>{lab.pct}</td>
                                    <th>Flag: </th>
                                    <td>{lab.pct_info}</td>
                                </tr>
                                <tr>
                                    <th>Sickling Test: </th>
                                    <td>{lab.sickling_test}</td>
                                    <th>BF (MPs): </th>
                                    <td>{lab.bf_mps}</td>
                                </tr>
                                <tr>
                                    <th>ESR: </th>
                                    <td colSpan="3">{lab.esr}</td>
                                </tr>
                                <tr>
                                    <th>Blood Film Comments: </th>
                                    <td colSpan="3">{lab.blood_film_comment}</td>
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

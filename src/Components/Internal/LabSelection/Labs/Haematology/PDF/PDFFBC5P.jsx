import React from 'react';
import moment from "moment";
import { Page, Text, View, Document, StyleSheet } from "@react-pdf/renderer";

const styles = StyleSheet.create({
    page: {
        backgroundColor: "#ffffff"
    },
    container: {
        display: "flex",
        flexDirection: "row",
        paddingLeft: 5,
        paddingRight: 2
    },
    two_column: {
        display: 'flex',
        flexDirection: 'row',
        marginTop: 10,
        marginRight: 20,
        marginBottom: 25,
        marginLeft: 10,
        borderTop: '1px solid #666',
        borderBottom: '1px solid #666',
        paddingTop: '10px',
        paddingBottom: '11px',
    },
    two_column_left: {
        textAlign: 'left',
        fontSize: 12,
        width: '50%'
    },
    two_column_right: {
        textAlign: 'right',
        fontSize: 12,
        width: '50%'
    },
    info_column: {
        display: 'flex',
        flexDirection: 'row',
        border: '1px solid #333',
        paddingBottom: 0,
        borderBottom: 'transparent',
    },
    info_two_column: {
        display: 'flex',
        flexDirection: 'row',
        paddingBottom: 0,
    },
    info_two_column_left: {
        textAlign: 'right',
        fontSize: 12,
        padding: 5,
        flex: '1 1 20%',
        color: '#555',
    },
    info_two_column_right: {
        textAlign: 'left',
        fontSize: 12,
        padding: 5,
        flex: '1 2 30%',
    },
    info_three_column: {
        display: 'flex',
        flexDirection: 'row',
        paddingBottom: 0,
    },
    info_three_column_left: {
        textAlign: 'right',
        fontSize: 12,
        padding: 5,
        flex: '1 1 13%',
        color: '#555',
    },
    info_three_column_right: {
        textAlign: 'left',
        fontSize: 12,
        padding: 5,
        flex: '1 2 20%',
    },
    row: {
        width: '100%'
    },
    row_left: {
        fontSize: 12,
        color: '#555',
        width: '20%',
        textAlign: 'right',
        padding: 5,
    },
    row_right: {
        fontSize: 12,
        width: '80%',
        textAlign: 'left',
        padding: 5,
    },
    addressHeader: {
        textAlign: 'center',
        fontSize: 20,
        fontWeight: 'extrabold',
        paddingBottom: 6,
        marginTop: 50,
    },
    addressSubHeader: {
        textAlign: 'center',
        fontSize: 14,
        fontWeight: 'semibold',
        paddingBottom: 6,
    },
    addressParagraph: {
        textAlign: 'center',
        fontSize: 12,
        paddingBottom: 6,
    },
    addressParagraphLast: {
        textAlign: 'center',
        fontSize: 12,
        paddingBottom: 6,
        marginBottom: 15,
    },
    table_column: {
        display: 'flex',
        flexDirection: 'row',
        border: '1px solid #333',
        paddingBottom: 0,
        borderLeft: 'transparent',
        borderRight: 'transparent',
        borderBottom: 'transparent',
        marginLeft: 30,
        marginRight: 30,
    },
    table_column_one: {
        fontSize: 12,
        flex: '1 1 35%',
        color: '#333',
    },
    table_column_two: {
        fontSize: 12,
        flex: '1 1 35%',
        color: '#012',
    },
    table_column_three: {
        fontSize: 12,
        flex: '1 1 30%',
        color: '#012',
    },
    table_column_wide: {
        fontSize: 12,
        flex: '1 1 62%',
        color: '#012',
    },
});

function PDFLab({ lab }) {
    return (
        <Document>
            <Page style={styles.page} size="A4" wrap>
                <View style={styles.container}>
                    <View>
                        <View>
                            <Text style={styles.addressHeader}>LIBERTY MEDICAL LABORATORY SERVICES</Text>
                            <Text style={styles.addressSubHeader}>RELIABLE LAB SERVICE AT YOUR CONVEVIENCE</Text>
                            <Text style={styles.addressParagraph}>P.O Box A.N 12143 Accra North, Ghana</Text>
                            <Text style={styles.addressParagraph}>Tel.: 050 012 5098 / 054 012 5099 / 055 663 3514 / 024 345 0808</Text>
                            <Text style={styles.addressParagraph}>Email: libertymedicallab@gmail.com / amoatengkweku@gmail.com</Text>
                            <Text style={styles.addressParagraph}>Loc:Opp. Korle Bu Admin Block, Opp. Korle Bu Police Station</Text>
                            <Text style={styles.addressParagraph}>Opp. Amasaman Hospital near World Vision Int'l Off Methodist Church</Text>
                            <Text style={styles.addressParagraphLast}>Agyirigano Health Link Clinic, East Legon</Text>
                        </View>
                        <View style={styles.two_column}>
                            <Text style={styles.two_column_left}>FBC 5P</Text>
                            <Text style={styles.two_column_right}>{moment().format('dddd Do MMMM YYYY [at] HH:mm:ss')}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Invoice:</Text>
                            <Text style={styles.info_two_column_right}>{lab.invoice_id}</Text>
                            <Text style={styles.info_two_column_left}>Patient ID:</Text>
                            <Text style={styles.info_two_column_right}>{lab.patient_id}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Patient:</Text>
                            <Text style={styles.info_two_column_right}>{lab.name}</Text>
                            <Text style={styles.info_two_column_left}>Gender:</Text>
                            <Text style={styles.info_two_column_right}>{lab.gender}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.row_left}>Date Of Birth:</Text>
                            <Text style={styles.row_right}>{lab.date_of_birth}</Text>
                        </View>
                        <View style={[styles.info_two_column, {marginBottom: 30}]}>
                            <Text style={styles.info_two_column_left}>Added By:</Text>
                            <Text style={styles.info_two_column_right}>{lab.staff}</Text>
                            <Text style={styles.info_two_column_left}>Date Added:</Text>
                            <Text style={styles.info_two_column_right}>{lab.date_added}</Text>
                        </View>
                        <View style={[styles.table_column, {borderTop: 'transparent',borderBottom: '1px solid #333', marginBottom: 5}]}>
                            <Text style={[styles.table_column_one, {color: '#333', fontSize: 14}]}>Test</Text>
                            <Text style={[styles.table_column_three, {color: '#333', fontSize: 14}]}>Results</Text>
                            <Text style={[styles.table_column_three, {color: '#333', fontSize: 14}]}>Flag</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"WBC"}</Text>
                            <Text style={styles.table_column_three}>{lab.wbc}</Text>
                            <Text style={styles.table_column_three}>{lab.wbc_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"NEU #"}</Text>
                            <Text style={styles.table_column_three}>{lab.neu_hash}</Text>
                            <Text style={styles.table_column_three}>{lab.neu_hash_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"LYM #"}</Text>
                            <Text style={styles.table_column_three}>{lab.lym_hash}</Text>
                            <Text style={styles.table_column_three}>{lab.lym_hash_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"MON #"}</Text>
                            <Text style={styles.table_column_three}>{lab.mon_hash}</Text>
                            <Text style={styles.table_column_three}>{lab.mon_hash_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"EOS #"}</Text>
                            <Text style={styles.table_column_three}>{lab.eos_hash}</Text>
                            <Text style={styles.table_column_three}>{lab.eos_hash_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"BAS #"}</Text>
                            <Text style={styles.table_column_three}>{lab.bas_hash}</Text>
                            <Text style={styles.table_column_three}>{lab.bas_hash_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"NEU %"}</Text>
                            <Text style={styles.table_column_three}>{lab.neu_percent}</Text>
                            <Text style={styles.table_column_three}>{lab.neu_percent_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"LYM %"}</Text>
                            <Text style={styles.table_column_three}>{lab.lym_percent}</Text>
                            <Text style={styles.table_column_three}>{lab.lym_percent_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"MON %"}</Text>
                            <Text style={styles.table_column_three}>{lab.mon_percent}</Text>
                            <Text style={styles.table_column_three}>{lab.mon_percent_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"EOS %"}</Text>
                            <Text style={styles.table_column_three}>{lab.eos_percent}</Text>
                            <Text style={styles.table_column_three}>{lab.eos_percent_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"BAS %"}</Text>
                            <Text style={styles.table_column_three}>{lab.bas_percent}</Text>
                            <Text style={styles.table_column_three}>{lab.bas_percent_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"RBC"}</Text>
                            <Text style={styles.table_column_three}>{lab.rbc}</Text>
                            <Text style={styles.table_column_three}>{lab.rbc_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"HGB"}</Text>
                            <Text style={styles.table_column_three}>{lab.hgb}</Text>
                            <Text style={styles.table_column_three}>{lab.hgb_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"HCT"}</Text>
                            <Text style={styles.table_column_three}>{lab.hct}</Text>
                            <Text style={styles.table_column_three}>{lab.hct_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"MCV"}</Text>
                            <Text style={styles.table_column_three}>{lab.mcv}</Text>
                            <Text style={styles.table_column_three}>{lab.mcv_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"MCHC"}</Text>
                            <Text style={styles.table_column_three}>{lab.mchc}</Text>
                            <Text style={styles.table_column_three}>{lab.mchc_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"RDW_CV"}</Text>
                            <Text style={styles.table_column_three}>{lab.rdw_cv}</Text>
                            <Text style={styles.table_column_three}>{lab.rdw_cv_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"RDW_SD"}</Text>
                            <Text style={styles.table_column_three}>{lab.rdw_sd}</Text>
                            <Text style={styles.table_column_three}>{lab.rdw_sd_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"PLT"}</Text>
                            <Text style={styles.table_column_three}>{lab.plt}</Text>
                            <Text style={styles.table_column_three}>{lab.plt_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"MPV"}</Text>
                            <Text style={styles.table_column_three}>{lab.mpv}</Text>
                            <Text style={styles.table_column_three}>{lab.mpv_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"PDW"}</Text>
                            <Text style={styles.table_column_three}>{lab.pdw}</Text>
                            <Text style={styles.table_column_three}>{lab.pdw_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"PCT"}</Text>
                            <Text style={styles.table_column_three}>{lab.pct}</Text>
                            <Text style={styles.table_column_three}>{lab.pct_flag}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"Sickling Test"}</Text>
                            <Text style={styles.table_column_three}>{lab.sickling_test}</Text>
                            <Text style={styles.table_column_three}>{''}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"ESR"}</Text>
                            <Text style={styles.table_column_three}>{lab.esr}</Text>
                            <Text style={styles.table_column_three}>{''}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"Blood Film Comments"}</Text>
                            <Text style={[styles.table_column_wide, {textAlign: 'left'}]}>{lab.blood_film_comment}</Text>
                        </View>
                    </View>
                </View>
            </Page>
        </Document>
    )
}

export default PDFLab;

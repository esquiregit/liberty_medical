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
        flex: '1 1 25%',
        color: '#333',
        textAlign: 'right'
    },
    table_column_two: {
        fontSize: 12,
        flex: '1 1 25%',
        textAlign: 'left',
        paddingLeft: 7,
        color: '#000'
    },
    table_column_wide: {
        fontSize: 12,
        flex: '1 1 75%',
        textAlign: 'left',
        paddingLeft: 7,
        color: '#000'
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
                            <Text style={styles.two_column_left}>Hepatitis Markers</Text>
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
                            <Text style={[styles.table_column_one, {color: '#333', fontSize: 14}]}></Text>
                            <Text style={[styles.table_column_two, {color: '#333', fontSize: 14}]}></Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent',}]}>
                            <Text style={styles.table_column_one}>{"Hep A IgG Antibody"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_a_igg_antibody}</Text>
                            <Text style={styles.table_column_one}>{"Hep B Core IgM Antibody"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_b_core_igm_antibody}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent',}]}>
                            <Text style={styles.table_column_one}>{"Hep A IgM Antibody"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_a_igm_antibody}</Text>
                            <Text style={styles.table_column_one}>{"Hep Be Antigen"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_be_antigen}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent',}]}>
                            <Text style={styles.table_column_one}>{"Hep B s Antigen"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_bs_antigen}</Text>
                            <Text style={styles.table_column_one}>{"Hep Be Antibody"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_be_antibody}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent',}]}>
                            <Text style={styles.table_column_one}>{"Hep B s Antibody"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_bs_antibody}</Text>
                            <Text style={styles.table_column_one}>{"Hep C Screen"}</Text>
                            <Text style={styles.table_column_two}>{lab.hep_c_screen}</Text>
                        </View>
                        <View style={[styles.table_column, {paddingTop: 8,paddingBottom: 8,borderTop: 'transparent',}]}>
                            <Text style={styles.table_column_one}>{"Hep B Core IgG Antibody"}</Text>
                            <Text style={styles.table_column_wide}>{lab.hep_b_core_igg_antibody}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',paddingTop: 8,paddingBottom: 8,borderTop: 'transparent'}]}>
                            <Text style={styles.table_column_one}>{"Comments"}</Text>
                            <Text style={styles.table_column_wide}>{lab.comments}</Text>
                        </View>
                    </View>
                </View>
            </Page>
        </Document>
    )
}

export default PDFLab;

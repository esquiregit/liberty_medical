import React, { useState } from 'react';
import clsx from 'clsx';
import Tab from '@material-ui/core/Tab';
import Card from '@material-ui/core/Card';
import Tabs from '@material-ui/core/Tabs';
import Footer from '../Layout/Footer';
import Header from '../Layout/Header';
import styles from '../../Extras/styles';
import Sidebar from '../Layout/Sidebar/Sidebar';
import Breadcrumb from '../Layout/Breadcrumb';
import EditHormonesTab from '../LabSelection/Tabs/EditHormonesTab';
import EditChemistryTab from '../LabSelection/Tabs/EditChemistryTab';
import EditImmunologyTab from '../LabSelection/Tabs/EditImmunologyTab';
import EditHaematologyTab from '../LabSelection/Tabs/EditHaematologyTab';
import EditBacteriologyTab from '../LabSelection/Tabs/EditBacteriologyTab';
import EditTumourMarkersTab from '../LabSelection/Tabs/EditTumourMarkersTab';
import { useSelector } from 'react-redux';
import { TabPanel, a11yProps } from '../LabSelection/Tabs/TabPanel';
import 'tippy.js/dist/tippy.css';

function ManageHistories({ history }) {
    const staff   = useSelector(state => state.authReducer.staff);
    const classes = styles();
    const visible = useSelector(state => state.sidebarReducer.visible);
    
    const [tabIndex, setTabIndex] = useState(4);

    const handleChange = (event, newValue) => {
        setTabIndex(newValue);
    }; 

    React.useEffect(() => {
        document.title = 'History | Liberty Medical Labs';
    }, [history]);
    
    return (
        <>
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="History" />
                <Card variant="outlined" className="p-40">
                    <Tabs
                        variant="scrollable"
                        scrollButtons="on"
                        indicatorColor="primary"
                        textColor="primary"
                        value={tabIndex}
                        onChange={handleChange}
                        aria-label="simple tabs example">
                        <Tab label="HORMONES" {...a11yProps(0)} />
                        <Tab label="CHEMISTRY" {...a11yProps(1)} />
                        <Tab label="HEAMATOLOGY" {...a11yProps(2)} />
                        <Tab label="BACTERIALOGY" {...a11yProps(3)} />
                        <Tab label="IMMUNOLOGY" {...a11yProps(4)} />
                        <Tab label="TUMOUR MARKERS" {...a11yProps(5)} />
                    </Tabs>
                    <TabPanel value={tabIndex} index={0}>
                        <EditHormonesTab history={history} />
                    </TabPanel>
                    <TabPanel value={tabIndex} index={1}>
                        <EditChemistryTab history={history} />
                    </TabPanel>
                    <TabPanel value={tabIndex} index={2}>
                        <EditHaematologyTab history={history} />
                    </TabPanel>
                    <TabPanel value={tabIndex} index={3}>
                        <EditBacteriologyTab history={history} />
                    </TabPanel>
                    <TabPanel value={tabIndex} index={4}>
                        <EditImmunologyTab history={history} />
                    </TabPanel>
                    <TabPanel value={tabIndex} index={5}>
                        <EditTumourMarkersTab history={history} />
                    </TabPanel>
                </Card>
            </main>
            <Footer />
        </>
    );
}

export default ManageHistories;

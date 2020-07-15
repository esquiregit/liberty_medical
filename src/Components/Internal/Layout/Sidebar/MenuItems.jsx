import React from 'react';
import EuroOutlinedIcon from '@material-ui/icons/EuroOutlined';
import BuildOutlinedIcon from '@material-ui/icons/BuildOutlined';
import ListAltOutlinedIcon from '@material-ui/icons/ListAltOutlined';
import DashboardOutlinedIcon from '@material-ui/icons/DashboardOutlined';
import PeopleAltOutlinedIcon from '@material-ui/icons/PeopleAltOutlined';
import VisibilityOutlinedIcon from '@material-ui/icons/VisibilityOutlined';
import EventAvailableOutlinedIcon from '@material-ui/icons/EventAvailableOutlined';
import InsertChartOutlinedOutlinedIcon from '@material-ui/icons/InsertChartOutlinedOutlined';
import WcOutlinedIcon from '@material-ui/icons/WcOutlined';

export const adminMenuItems   = [
    {
        label: 'Dashboard',
        icon : <DashboardOutlinedIcon />,
        url  : '/dashboard/'
    },
    {
        type: 'divider',
        key : 1
    },
    {
        label: 'Patients',
        icon : <WcOutlinedIcon />,
        url  : '/patients/'
    },
    {
        type: 'divider',
        key : 2
    },
    {
        label: 'Requests',
        icon : <ListAltOutlinedIcon />,
        url  : '/requests/'
    },
    {
        type: 'divider',
        key : 3
    },
    {
        label: 'History',
        icon : <EventAvailableOutlinedIcon />,
        url  : '/history/'
    },
    {
        type: 'divider',
        key : 4
    },
    {
        label: 'Charges',
        icon : <EuroOutlinedIcon />,
        url  : '/charges/'
    },
    {
        type: 'divider',
        key : 5
    },
    {
        label: 'Staff',
        icon : <PeopleAltOutlinedIcon />,
        url  : '/staff/'
    },
    {
        type: 'divider',
        key : 6
    },
    {
        label: 'Roles',
        icon : <BuildOutlinedIcon />,
        url  : '/roles/'
    },
    {
        type: 'divider',
        key : 7
    },
    {
        label: 'Report',
        icon : <InsertChartOutlinedOutlinedIcon />,
        url  : '/report/'
    },
    {
        type: 'divider',
        key : 8
    },
    {
        label: 'Activity Log',
        icon : <VisibilityOutlinedIcon />,
        url  : '/activity-log/'
    },
    {
        type: 'divider',
        key : 9
    }
];
export const frontDeskMenuItems   = [
    {
        label: 'Dashboard',
        icon : <DashboardOutlinedIcon />,
        url  : '/dashboard/'
    },
    {
        type: 'divider',
        key : 1
    },
    {
        label: 'Patients',
        icon : <WcOutlinedIcon />,
        url  : '/patients/'
    },
    {
        type: 'divider',
        key : 2
    },
    {
        label: 'Requests',
        icon : <ListAltOutlinedIcon />,
        url  : '/requests/'
    },
    {
        type: 'divider',
        key : 3
    },
    {
        label: 'History',
        icon : <EventAvailableOutlinedIcon />,
        url  : '/history/'
    },
    {
        type: 'divider',
        key : 4
    },
    {
        label: 'Charges',
        icon : <EuroOutlinedIcon />,
        url  : '/charges/'
    },
    {
        type: 'divider',
        key : 5
    },
    {
        label: 'Report',
        icon : <InsertChartOutlinedOutlinedIcon />,
        url  : '/report/'
    },
    {
        type: 'divider',
        key : 6
    }
];
export const labTechMenuItems   = [
    {
        label: 'Dashboard',
        icon : <DashboardOutlinedIcon />,
        url  : '/dashboard/'
    },
    {
        type: 'divider',
        key : 1
    },
    {
        label: 'Requests',
        icon : <ListAltOutlinedIcon />,
        url  : '/requests/'
    },
    {
        type: 'divider',
        key : 2
    },
    {
        label: 'History',
        icon : <EventAvailableOutlinedIcon />,
        url  : '/history/'
    },
    {
        type: 'divider',
        key : 3
    },
    {
        label: 'Report',
        icon : <InsertChartOutlinedOutlinedIcon />,
        url  : '/report/'
    },
    {
        type: 'divider',
        key : 4
    }
];
